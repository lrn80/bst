<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/2
 * Time: 21:45
 */

namespace app\lib\exception;


class TokenException extends  BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}