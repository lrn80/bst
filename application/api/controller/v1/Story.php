<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 19:05
 */

namespace app\api\controller\v1;
use app\api\controller\BaseController;
use  app\api\model\Story as StoryModel;
use app\api\validate\IDMustbePostiveInt;
use app\lib\exception\GetException;
use app\lib\exception\StoryMissException;
use think\Request;

class Story extends  BaseController
{
    public  function  getStoryImg(){

            $story =StoryModel::StoryImg();
            if(!$story){
                //    log(error);
                throw  new StoryMissException();
            }
            return json($story) ;

    }
	public  function  Newest(){
       $story =StoryModel::Newest();
       if(!$story){
           //    log(error);
           throw  new StoryMissException();
       }
       return json($story) ;
   }
    public  function  getDynastyStory($id){
        (new IDMustbePostiveInt())->goCheck();
        if($id==2){
            $story =StoryModel::allStory();
            if(!$story){
                //    log(error);
                throw  new StoryMissException();
            }
            return json($story) ;
        }else{
        $dstory =StoryModel::DynastyStory($id);
        if(!$dstory){
            //    log(error);
            throw  new StoryMissException();
        }
        return json($dstory) ;
		}

    }
    public  function  gettimedesc($id){
        (new IDMustbePostiveInt())->goCheck();
        $tstory =StoryModel::timedesc($id);
        if(!$tstory){
            //    log(error);
            throw  new StoryMissException();
        }
        return json($tstory) ;

    }
    public  function  gettimeasc($id){
        (new IDMustbePostiveInt())->goCheck();
        $astory =StoryModel::timeasc($id);
        if(!$astory){
            //    log(error);
            throw  new StoryMissException();
        }
        return json($astory);

    }



}