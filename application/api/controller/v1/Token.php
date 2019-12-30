<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/2
 * Time: 16:52
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\UserToken;
use app\api\validate\TokenGet;
use app\api\service\Token as TokenService;
use app\lib\exception\ParameterException;

class Token extends  BaseController
{
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $wx = new UserToken($code);
        $token = $wx->get();
        return  json($token);

    }
    public function verifyToken($token='')
    {
     //   dump($token);
        if(!$token){
            throw new ParameterException([
              'token不允许为空'
            ]);
        }
        $valid = TokenService::verifyToken($token);
        return json($valid);

 }
}