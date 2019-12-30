<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 10:07
 */

namespace app\api\model;


use think\Db;
use app\api\service\Token as TokenSerice;
class Collection extends  BaseModel
{
    protected  $autoWriteTimestamp=true;
    protected $hidden = ['id', 'img_id','praise_id', 'conment_id','collection_id', 'delete_time','create_time','update_time'];
    public  function  story(){
        $re=$this->belongsTo('Story','story_id','id');
        return $re;
    }
    public  static  function  getCollection($story_id,$user_id){
           $update = date('Y-m-d H:i:s', time());
        $result=Db::table("collection")->where("story_id",$story_id)->where("user_id",$user_id)->select();
        if(!$result){
            $data=["story_id"=>$story_id,"user_id"=>$user_id,"update_time" => $update];
            $code=Db::table("collection")->insert($data);
            if($code) {
                return true;
            }

        }else{
            return false;
        }
    }
    public  static  function  delCollection($story_id,$user_id){


        $app = self::where('story_id','=',$story_id)
            ->where('user_id', '=',$user_id)
            ->delete();
        return $app;

    }
    public  static  function  readCollection($user_id){

      $readstory=self::query("select   collection.story_id,story.name ,url,collection.update_time
        from story,image,collection
        where  story.img_id=image.id
         and   story.id=collection.story_id
           and collection.user_id=?",[$user_id]);

        $arr=array();
        foreach($readstory as $k)
        {

            $k["url"]=config('queue.img_prefix').$k["url"];
            $arr[]=$k;

        }

        return $arr;
    }
    //批量删除多个 收藏记录
    public static function  delSomeCollention($story_id,$user_id){

        $result=self::where("story_id",'in',$story_id)->where('user_id', '=',$user_id)
            ->delete();
        return $result;

    }
}