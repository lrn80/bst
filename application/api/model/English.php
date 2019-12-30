<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 13:23
 */

namespace app\api\model;


class English extends  BaseModel
{
    protected  $autoWriteTimestamp=true;

    public  function  img(){
        $re=$this->belongsTo('Image','img_id','id');
        return $re;
    }
    public  static  function  EnglishImg(){
        $english = self::with(['img'])
            ->find(1);

        return $english;
    }

}