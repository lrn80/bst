<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 10:05
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token as TokenSerice;
use app\api\model\Collection  as CollectionModel;
use app\api\validate\IDMustbePostiveInt;
use app\lib\exception\CollectionReceptException;
use app\lib\exception\ParisedelException;

class Collection extends  BaseController
{
    //收藏
    public  function  getCollection($story_id){


        $user_id=TokenSerice::getCurrentTokenVar('uid');
        $parise =CollectionModel::getCollection($story_id,$user_id);
        if(!$parise){
            //    log(error);
            throw  new CollectionReceptException();
        }
        return 1;
    }
    //取消收藏
    public  function  delCollection($story_id){

        $user_id=TokenSerice::getCurrentTokenVar('uid');
        $parise =CollectionModel::delCollection($story_id,$user_id);
        if(!$parise){
            //    log(error);
            throw  new ParisedelException();
        }
        return 1;
    }
    //收藏浏览
    public  function  readStory(){

        $user_id=TokenSerice::getCurrentTokenVar('uid');
        $astory =CollectionModel::readCollection($user_id);

//        if(!$astory){
//            //    log(error);
//            throw  new StoryMissException();
//        }
        return json($astory);

    }
    //批量删除 收藏记录
    public  function  DelsomeCollention(){
        $user_id=TokenSerice::getCurrentTokenVar('uid');
        $story_id=input("story_id/a");
        $story_id=implode(",",$story_id);
        $result=CollectionModel::delSomeCollention($story_id,$user_id);
        return $result;
    }
}