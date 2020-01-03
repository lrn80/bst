<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/20
 * Time: 19:27
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends  Validate
{
    public function  goCheck(){
        $request=Request::instance();
        $params=$request->param();

        $request=$this->batch()->check($params);
        if(!$request){
            $e=new ParameterException([
                'msg'=>$this->error
            ]);
            throw $e;
        }else{
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return false;
//        return $field . '必须是正整数';
    }
    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return false;
//            return $field . '不允许为空';
        } else {
            return true;
        }
    }
}