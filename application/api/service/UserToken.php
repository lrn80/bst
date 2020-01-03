<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/2
 * Time: 17:02
 */

namespace app\api\service;


use app\api\model\User;
use app\lib\enum\ScopeEnum;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends  Token
{
    protected $code;
    protected $wxLoginUrl;
    protected $wxAppID;
    protected $wxAppSecret;

    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(
            config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }
    public function get()
    {
        //$this->wxLoginUrl是要请求的Url
        $result = curl_get($this->wxLoginUrl);
        // 注意json_decode的第一个参数true
        // 这将使字符串被转化为数组而非对象
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }
        else {

            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            }
            else {
                return $this->grantToken($wxResult);
            }
        }
    }
    private function processLoginError($wxResult)
    {
        throw new WeChatException(
            [
                'msg' => $wxResult['errmsg'],
                'errorCode' => $wxResult['errcode']
            ]);
    }
    //授权/办法令牌
    private function grantToken($wxResult)
    {
        //拿到openid
        $openid = $wxResult['openid'];
        //在数据库中查找这个openid是否存在
        //如果不存则为用户新增一条记录
        $user = User::getByOpenID($openid);
        // 借助微信的openid作为用户标识
        // 但在系统中的相关查询还是使用自己的uid
        if (!$user)
        {
            //创建一个新用户
            $uid = $this->newUser($openid);
        }
        else {
            $uid = $user->id;
        }
        $cachedValue = $this->prepareCachedValue($wxResult, $uid);
        //生成令牌，准备缓存数据，写入缓存
        $token = $this->saveToCache($cachedValue);
        return $token;
    }
    private function newUser($openid)
    {
        // 有可能会有异常，如果没有特别处理
        // 这里不需要try——catch
        // 全局异常处理会记录日志
        // 并且这样的异常属于服务器异常
        // 也不应该定义BaseException返回到客户端
        $create = date('Y-m-d H:i:s', time());
        $user = User::create(
            [
                'openid' => $openid,
                'create_time'=>$create
            ]);
        return $user->id;
    }
    private function prepareCachedValue($wxResult, $uid)
    {
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] =ScopeEnum::User;
        return $cachedValue;
    }
    // 写入缓存
    private function saveToCache($wxResult)
    {
        $key = self::generateToken();
        $value = json_encode($wxResult);
        $expire_in = config('queue.token_expire_in');
        $result = cache($key, $value, $expire_in);

        if (!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }
}