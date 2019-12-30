<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/21
 * Time: 11:03
 */

namespace app\api\model;


use think\Model;

class BaseModel extends  Model
{
    protected  function  prefixImgUrl($value,$data)
    {
        $finalUrl = $value;
        if ($data['fromcome'] == 1) {
            $finalUrl = config('queue.img_prefix').$value;
        }
        return $finalUrl;
    }
}