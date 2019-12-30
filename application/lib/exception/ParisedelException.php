<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/29
 * Time: 10:17
 */

namespace app\lib\exception;


class ParisedelException extends  BaseException
{
    public  $code =404;
    public  $msg='取消点赞或收藏失败，请确认';
    public  $errorCode=40000;
}