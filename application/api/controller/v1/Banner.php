<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/20
 * Time: 19:59
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustbePostiveInt;
use app\api\validate\IDMustBetween;
use app\lib\exception\BannerMissException;
use app\lib\exception\IDexception;
use think\Controller;
use think\Exception;

class Banner extends  BaseController
{
    public  function  getBanner($id){
        (new IDMustbePostiveInt())->goCheck();
        (new IDMustBetween())->goCheck();
        $banner =BannerModel::getBannerByID($id);
        if(!$banner){
            //    log(error);
            throw  new BannerMissException();
        }
        return $banner ;
    }
}