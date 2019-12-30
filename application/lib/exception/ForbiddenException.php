<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/3
 * Time: 12:23
 */

namespace app\lib\exception;


class ForbiddenException extends  BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}