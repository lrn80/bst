<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/3
 * Time: 11:31
 */

namespace app\api\controller;


use think\Controller;
use app\api\service\Token;

class BaseController  extends  Controller
{
    protected function checkExclusiveScope()
    {
        Token::needExclusiveScope();
    }

    protected function checkPrimaryScope()
    {
        Token::needPrimaryScope();
    }

    protected function checkSuperScope()
    {
        Token::needSuperScope();
    }
}