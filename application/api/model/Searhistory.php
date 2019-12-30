<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 19:19
 */

namespace app\api\model;



class Searhistory extends  BaseModel
{
  
    public static  function  LookHistory($user_id){
    $result=self::query("select * from searhistory  where user_id=? order by update_time desc",[$user_id]);
    return $result;
}
    public static  function  remenSearch(){
        $result=self::query("select * from searhistory order by popular_num desc");
        return $result;
    }
     public  static  function  delHistorySearch($name,$user_id){
        $storyhistory = self::where("storname", "like", "$name")->where("user_id","=",$user_id)->delete();
        return $storyhistory;
    }
    public  static  function  delAllHistorySearch($user_id){
        $storyhistory = self::where("user_id","=",$user_id)->delete();
        return $storyhistory;
    }

}