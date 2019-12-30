<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 13:26
 */

namespace app\lib\exception;


class EnglishMissException extends  BaseException
{
    public  $code =404;
    public  $msg='请求的English图不存在';
    public  $errorCode=40000;
}