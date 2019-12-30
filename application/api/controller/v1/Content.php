<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 21:36
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Content as ContentModel;
class Content extends  BaseController
{
   public  function  getContent($story_id){
       $result=ContentModel::readContent($story_id);
     //  dump($result);
      return json($result);
   }
}