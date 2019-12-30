<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 19:31
 */

namespace app\lib\exception;


class StoryMissException extends  BaseException
{
    public  $code =404;
    public  $msg='请求的Story不存在';
    public  $errorCode=40000;
}