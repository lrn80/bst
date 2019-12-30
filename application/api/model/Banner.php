<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/26
 * Time: 10:53
 */

namespace app\api\model;


class Banner extends  BaseModel
{
    protected  $autoWriteTimestamp=true;
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public  static  function  getBannerByID($id){
        $banner = self::with(['items','items.img'])
            ->find($id);


        return $banner;
    }
}