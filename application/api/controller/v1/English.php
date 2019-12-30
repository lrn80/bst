<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 13:24
 */

namespace app\api\controller\v1;
use app\api\controller\BaseController;
use app\api\model\English as EnglishModel;


class English extends BaseController
{
    public  function  getEnglishImg(){
        $english =EnglishModel::EnglishImg();
        if(!$english){
            //    log(error);
            throw  new EnglishMissException();
        }
        return $english ;
    }
}