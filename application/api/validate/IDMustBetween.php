<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/26
 * Time: 11:26
 */

namespace app\api\validate;


class IDMustBetween extends  BaseValidate
{

    protected  $rule=[
        'id'=>'between:1,1'
    ];


}