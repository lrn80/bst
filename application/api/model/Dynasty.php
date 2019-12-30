<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/27
 * Time: 21:30
 */

namespace app\api\model;


class Dynasty extends  BaseModel
{
    protected $hidden = ['id','d_time','story_id','delete_time','create_time','update_time'];
    public  static function  sendDynasty(){
        $re = self::order("sort","asc")->select();
        return $re;
    }
}