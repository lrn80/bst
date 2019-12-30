<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 11:31
 */

namespace app\lib\exception;


class GetException extends  BaseException
{
    public  $code =404;
    public  $msg='请求方式不正确';
    public  $errorCode=40000;
}