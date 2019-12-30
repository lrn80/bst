<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/26
 * Time: 11:17
 */

namespace app\api\model;


class Image extends  BaseModel
{
    protected $hidden = ['delete_time', 'id', 'from'];

    public  function  getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}