<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::get('api/:version/test/test', 'api/:version.Test/testEx');
//banner主题接口那个轮播图
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
//国内图
Route::get('api/:version/chinese/getChinese', 'api/:version.Chinese/getChineseImg');
//国外图
Route::get('api/:version/english/getEnglish', 'api/:version.English/getEnglishImg');


//精品主题接口
Route::get('api/:version/story/getStoryImg', 'api/:version.Story/getStoryImg');
//全部数据接口
Route::get('api/:version/story/allStoryImg', 'api/:version.Story/allStoryImg');
//热度排序接口  传入的id为那个朝代的id
Route::post('api/:version/story/:id', 'api/:version.Story/getDynastyStory');
//按时间降序排序
Route::post('api/:version/story/desc/:id', 'api/:version.Story/gettimedesc');
//按时间升序排序
Route::post('api/:version/story/asc/:id', 'api/:version.Story/gettimeasc');
//最新接口
Route::get('api/:version/story/newest', 'api/:version.Story/Newest');
//故事搜索
Route::post('api/:version/search/search', 'api/:version.search/postSearch');
//搜索历史接口
Route::get('api/:version/search/look', 'api/:version.search/LookStory');
//删除搜所历史
Route::post('api/:version/search/delSearch', 'api/:version.search/delSearch');
//删除搜所历史记录的所有 需要带着Token来访问
Route::post('api/:version/search/delAllSearch', 'api/:version.search/delAllSearch');
//热门搜所接口
Route::get('api/:version/search/remen', 'api/:version.search/remenSearch');


//点赞接口 做中间值
Route::post('api/:version/parise/getParise/:story_id', 'api/:version.parise/getParise');
//取消点赞接口 做中间值
Route::delete('api/:version/parise/delParise/:story_id', 'api/:version.parise/delParise');
//点赞浏览接口
Route::get('api/:version/parise/readStory', 'api/:version.parise/readStory');
//批量取消点赞记录 做中间值
Route::post('api/:version/parise/delsomeParise', 'api/:version.parise/DelsomeParise');



//生成token令牌端口
Route::post('api/:version/token/user', 'api/:version.Token/getToken');
//检验令牌是否还有效
Route::post('api/:version/token/verify', 'api/:version.Token/verifyToken');

//收藏接口 做中间值
Route::post('api/:version/collection/getCollection/:story_id', 'api/:version.collection/getCollection');
//取消收藏接口 做中间值
Route::delete('api/:version/collection/delCollection/:story_id', 'api/:version.collection/delCollection');
//收藏浏览接口
Route::get('api/:version/collection/readStory', 'api/:version.collection/readStory');
//批量取消收藏记录 做中间值
Route::post('api/:version/collection/delsomeCollection', 'api/:version.collection/DelsomeCollention');

//内容接口
Route::get('api/:version/content/getContent/:story_id', 'api/:version.content/getContent');
Route::get('api/:version/Dynasty/sendDynasty', 'api/:version.dynasty/sendDynasty');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
