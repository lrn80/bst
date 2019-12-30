<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/4
 * Time: 10:13
 */

namespace app\lib\exception;


class CollectionReceptException extends  BaseException
{
    public  $code =404;
    public  $msg='重复收藏，或者收藏失败';
    public  $errorCode=40000;
}