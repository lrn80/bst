<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 12:04
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\lib\exception\GetException;
use think\Request;
use app\api\model\Story as StoryModel;
use app\api\model\Searhistory ;
use app\api\service\Token as TokenModel;
class Search  extends  BaseController
{
    public  function  postSearch(){
        // 因为Request类属于单例模式 所以 不能直接new
        $user_id=TokenModel::getCurrentTokenVar('uid');
        $request=Request::instance();
        if($request->isPost())
        {
            $Storyname=$request->only('Storyname');
            $namestr="";
            foreach ($Storyname as $k => $v){
                $namestr.=$v;
            }
            $result=StoryModel::SearchStory($namestr,$user_id);
            if(empty($result))
            {
                return 0;
            }
            return json($result);
        }else{
            throw new  GetException();
        }
    }
    public  function  LookStory(){
		$user_id=TokenModel::getCurrentTokenVar('uid');
       $result=Searhistory::LookHistory($user_id);
       return json($result);
    }
    public  function  remenSearch(){
        $result=Searhistory::remenSearch();
        return json($result);
    }

    //删除历史搜索
    public  function  delSearch(){
		 $user_id=TokenModel::getCurrentTokenVar('uid');
        $request=Request::instance();
        if($request->isPost())
        {
            $Storyname=$request->only('name');
            $namestr="";
            foreach ($Storyname as $k => $v){
                $namestr.=$v;
            }
            $result=Searhistory::delHistorySearch($namestr,$user_id);
            return json($result);
        }else{
            throw new  GetException();
        }
	}
	  //删除所有历史搜索
        public  function  delAllSearch(){
              $user_id=TokenModel::getCurrentTokenVar('uid');
                $result=Searhistory::delAllHistorySearch($user_id);
                if($result>=1) {
                    return json($result);

                }
                else{
                    return json("没有可以删除的搜索历史数据");
                }

    }
}