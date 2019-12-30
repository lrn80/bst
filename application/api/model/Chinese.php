<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 11:40
 */

namespace app\api\model;


class Chinese extends  BaseModel
{
    protected  $autoWriteTimestamp=true;

    public  function  img(){
        $re=$this->belongsTo('Image','img_id','id');
        return $re;
    }
    public  static  function  ChineseImg(){
        $chinese = self::with(['img'])
            ->find(1);

        return $chinese;
    }

}