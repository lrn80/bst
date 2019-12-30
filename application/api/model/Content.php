<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 21:32
 */

namespace app\api\model;


use think\Db;

class Content extends  BaseModel
{
    public  function  getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    public  static  function  readContent($story_id){

        $result=self::where("story_id","=",$story_id)->order("sort",'asc')->select();
     //  if($result) {
            $re = Db::execute("UPDATE  story  SET `brower` = `brower`+1 WHERE  id=? ",[$story_id]);
            // $result=self::query("select * from story where story=?")
     //  }
        return $result;
    }
}