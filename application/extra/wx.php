<?php
/**
 * Created by PhpStorm.
 * User: 李若宁
 * Date: 2019/5/2
 * Time: 17:24
 */
return [
    //  +---------------------------------
    //  微信相关配置
    //  +---------------------------------

    // 小程序app_id
    'app_id' => 'wx928c8fdcf8c9e80d',
    // 小程序app_secret
    'app_secret' => 'afed44487daa555cbd445d8be336be30',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",

    // 获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",


];