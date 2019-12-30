<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/21
 * Time: 10:31
 */

namespace app\lib\exception;


class ParameterException extends  BaseException
{

    public  $code =400;
    public  $msg='参数错误';
    public  $errorCode=10000;
}
