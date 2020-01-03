<?php


namespace app\api\model;


use think\Exception;

class Test
{
    public static  function getTestByID(){
        try{
            1/0;
        }catch (Exception $ex){
            throw $ex;
        }
        return "this is test";
    }

}