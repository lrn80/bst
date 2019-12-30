<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/26
 * Time: 10:51
 */

namespace app\lib\exception;


class BannerMissException extends  BaseException
{
    public  $code =404;
    public  $msg='请求的Banner不存在';
    public  $errorCode=40000;
}