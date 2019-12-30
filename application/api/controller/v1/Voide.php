<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/21
 * Time: 11:22
 */

namespace app\api\controller\v1;


use think\Controller;

class Voide extends  Controller
{
    public  function  Voide(){
        //dump(1111);
        return $result=config('queue.img_prefix')."/test.mp4";

    }
}