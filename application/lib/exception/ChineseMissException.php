<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 12:10
 */

namespace app\lib\exception;


class ChineseMissException extends  BaseException
{
    public  $code =404;
    public  $msg='请求的Chinese图不存在';
    public  $errorCode=40000;
}