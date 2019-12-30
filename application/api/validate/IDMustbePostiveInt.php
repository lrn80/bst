<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/20
 * Time: 19:03
 */

namespace app\api\validate;


use think\Validate;

class IDMustbePostiveInt extends BaseValidate
{
     protected  $rule=[
         'id'=>'require|isPositiveInteger'
     ];
}