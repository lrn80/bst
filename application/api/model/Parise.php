<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/28
 * Time: 10:37
 */

namespace app\api\model;


use app\lib\exception\PariseReceptException;
use think\Db;

class Parise extends  BaseModel
{
	public  function  getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    protected  $autoWriteTimestamp=true;
    protected  $parise_num=0;
    protected $hidden = ['id', 'img_id','praise_id', 'conment_id','collection_id', 'delete_time','create_time','update_time'];
    public  function  story(){
        $re=$this->belongsTo('Story','story_id','id');
        return $re;
    }
	
    public  static  function  getParise($story_id,$user_id){
            $update = date('Y-m-d H:i:s', time());
            $result=Db::table("parise")->where("story_id",$story_id)->where("user_id",$user_id)->select();
            if(!$result){
                $data=["story_id"=>$story_id,"user_id"=>$user_id,"update_time" => $update];

               $code=Db::table("parise")->insert($data);
                if($code) {
                    return true;
                }

            }else{
                return false;
            }
    }
    public  static  function  delParise($story_id,$user_id){


           $app = self::where('story_id','=',$story_id)
            ->where('user_id', '=',$user_id)
            ->delete();
            return $app;
    }
    //批量删除多个 点赞记录
    public static function  delSomeParise($story_id,$user_id){

        $result=self::where("story_id",'in',$story_id)->where('user_id', '=',$user_id)
                ->delete();
            return $result;

    }

    public  static  function  readParise($user_id){

    
		  $readstory=self::query("select   parise.story_id,story.name ,url,parise.update_time
        from story,image,parise
        where  story.img_id=image.id
         and   story.id=parise.story_id
           and parise.user_id=?",[$user_id]);
		
		 $arr=array();
		   foreach($readstory as $k)
		   {
			 
			  $k["url"]=config('queue.img_prefix').$k["url"];
			$arr[]=$k;
			
		   }
		
     return $arr;
	}
}