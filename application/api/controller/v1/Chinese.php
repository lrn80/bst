<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 11:36
 */

namespace app\api\controller\v1;
use app\api\controller\BaseController;
use app\api\model\Chinese as ChineseModel;
use think\Controller;

class Chinese extends  BaseController
{
   public  function  getChineseImg(){
       $chinese =ChineseModel::ChineseImg();
       if(!$chinese){
           //    log(error);
           throw  new ChineseMissException();
       }
       return $chinese ;
   }
}