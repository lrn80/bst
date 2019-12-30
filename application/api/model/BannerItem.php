<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/26
 * Time: 11:15
 */

namespace app\api\model;


class BannerItem extends  BaseModel
{
    protected $hidden = ['id', 'img_id', 'banner_id', 'delete_time'];

    public  function  img(){
        $re=$this->belongsTo('Image','img_id','id');
        return $re;
    }
}