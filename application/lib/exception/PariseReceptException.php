<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/28
 * Time: 11:10
 */

namespace app\lib\exception;



class PariseReceptException extends  BaseException
{
    public  $code =404;
    public  $msg='重复点赞，或者点赞收藏失败';
    public  $errorCode=40000;
}