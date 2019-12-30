<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/28
 * Time: 10:30
 */

namespace app\api\controller\v1;
use app\api\controller\BaseController;
use app\api\validate\IDMustbePostiveInt;
use app\lib\exception\ParisedelException;
use app\lib\exception\PariseReceptException;
use app\api\service\Token as TokenModel;
use app\api\model\Parise as PariseModel;
class Parise extends  BaseController
{
	// protected $beforeActionList=[
    //    'checkPrimaryScope'=>['only'=>'getParise,delParise,readStory,DelsomeParise']
   // ];
    //点赞
      public  function  getParise($story_id){

         // (new IDMustbePostiveInt())->goCheck();
          $user_id=TokenModel::getCurrentTokenVar('uid');
          $parise =PariseModel::getParise($story_id,$user_id);
          if(!$parise){
              //    log(error);
              throw  new PariseReceptException();
          }
          return json($parise);
      }
      //取消点赞
      public  function  delParise($story_id){
         // (new IDMustbePostiveInt())->goCheck();
          $user_id=TokenModel::getCurrentTokenVar('uid');
          $parise =PariseModel::delParise($story_id,$user_id);
		 
          if(!$parise){
              //    log(error);
              throw  new ParisedelException();
          }
          return json($parise);
      }
      //点赞浏览
    public  function  readStory(){
        $user_id=TokenModel::getCurrentTokenVar('uid');
        $astory =PariseModel::readParise($user_id);
        return json($astory);

    }
    public  function  DelsomeParise(){
        $user_id=TokenModel::getCurrentTokenVar('uid');
        $story_id=input("story_id/a");
        $story_id=implode(",",$story_id);
        $result=PariseModel::delSomeParise($story_id,$user_id);
        return $result;
    }
}