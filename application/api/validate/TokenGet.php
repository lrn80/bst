<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/2
 * Time: 17:02
 */

namespace app\api\validate;


class TokenGet extends  BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message=[
        'code' => 'sorry，你还未拿到code码'
    ];
}