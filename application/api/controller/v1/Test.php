<?php


namespace app\api\controller\v1;
use app\api\model\Test as testModel;

use think\Validate;

class test
{
    public function test(){
        $data=[
          'name'=>'admin111',
          'email'=>'lrnjy@qq.com'
        ];
//        $validate= new Validate([
//           'name'=>'require|max:6',
//            'email'=>'email'
//        ]);
        $validate=new TestValidate();
       $validate->check($data);
       echo $validate->getError();  //打印出错误信息
    }
    public function testEx(){
        $re=testModel::getTestByID();
        return $re;
    }
}