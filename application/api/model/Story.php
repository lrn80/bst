<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/4/27
 * Time: 19:23
 */

namespace app\api\model;


use think\Db;

class Story extends  BaseModel
{
    protected  $autoWriteTimestamp=true;
    protected $hidden = ['img_id','praise_id', 'conment_id','collection_id', 'delete_time','create_time','update_time'];
    public  function  img(){
        $re=$this->belongsTo('Image','img_id','id');
        return $re;
    }

    public  static  function  StoryImg(){
        $story = self::with(['img'])->order("brower","desc")
            ->select();

        return $story;
    }
	
    public  static  function  allStory(){
        $story = self::with(['img'])->select();

        return $story;
    }
    //热度排序
    public  static  function  DynastyStory($id){
        if($id==2){
            $tstory = self::with(['img'])->order("Atime","desc")
                ->select();
            return $tstory;
        }else {
            $story = self::with(['img'])->where('d_id', '=', $id)->order("brower", "desc")
                ->select();
        }
        return $story;
    }

    //时间从高到底排序
    public  static  function  timedesc($id){
   if($id==2){
	    $tstory = self::with(['img'])->order("Atime","desc")
            ->select(); 
   }else{
        $tstory = self::with(['img'])->where('d_id','=',$id)->order("Atime","desc")
            ->select();
   }
		return $tstory;
    }
    //时间从低到高
    public  static  function  timeasc($id){
      if($id==2){
	    $astory = self::with(['img'])->order("Atime","asc")
            ->select(); 
   }else{
        $astory = self::with(['img'])->where('d_id','=',$id)->order("Atime","asc")
            ->select();
   }
		return $astory;
    }
	public  static  function  Newest(){
        $story = self::with(['img'])->order("create_time","desc")
            ->select();

        return $story;
    }

    //点赞浏览接口
    public  static  function  ParCollread($arr){
     //   $hidden = ['id', 'img_id','praise_id', 'conment_id','collection_id', 'delete_time','create_time','update_time'];
        $cc="";
        foreach ($arr as $k => $v){
            $cc.=$v.",";
        }
        $xx = rtrim($cc, ',');
       
    // echo $arr;
    //    $pstory=self::query("select story.name url from  story  join image where story.img_id=image.id and story.id=?",[$xx]);
       $pstory = self::with(['img'])->select($xx);
    //   dump($pstory);
        return $pstory;
    }

    public  static  function  SearchStory($Sname,$user_id){

       $Sstory = self::with(['img'])->where("name","like","%$Sname%")->select();
        $str="";
//        foreach ($Sstory as $arr){
//            $str.=$arr['name'];
//        }
        if(!$Sstory=="") {
            $his = self::Searchhistory($Sname, $user_id);
        }
        return $Sstory;
    }
    public  static  function  Searchhistory($Sname,$user_id)
    {

        $update = date('Y-m-d H:i:s', time());
        $storyhistory = Db::table("searhistory")->where("storname", "like", "$Sname")->where("user_id","=","$user_id")->select();
        if ($storyhistory) {
            //执行SQL语句，并返回结果
            $re = Db::execute("UPDATE  searhistory  SET `popular_num` = `popular_num`+1,update_time=?  WHERE  storname=? and user_id=?", [$update, $Sname,$user_id]);
            return "";
        } else {
            $data = ["storname" => $Sname, "update_time" => $update,"user_id"=>$user_id];
            $result = Db::table("searhistory")->insert($data);
            return $result;
        }
    }

}