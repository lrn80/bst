<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/27
 * Time: 21:28
 */

namespace app\api\controller\v1;

use app\api\model\Dynasty as DynastyModel;
use app\api\controller\BaseController;

class Dynasty extends  BaseController
{
   public  function  sendDynasty()
   {
      $re=DynastyModel::sendDynasty();
      return json($re);
   }
}