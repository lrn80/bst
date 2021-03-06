#### 前言 
这个小程序是在19年3月份初次学完`thinkPHP5`，利用`RESTful api` 基于`REST`的`api`设计理论完成的。
#### 小程序的简单介绍
- 小程序主要是对景点的旅游信息简要概述的方式传达给使用者。
- 服务器端：`ThinkPHP5+Mysql` 构建`REST API`
- 客户端： 向服务端请求数据，完成自身的行为逻辑
### 主要的技术
#### 路由
- HTTP方法对资源进行增、删、改、查、，方法：`GET`(查询)、`POST`(创建)、`DELETE`(删除)、`PUT`(更新)、`*`(任意的请求类型 )  
- 在路由中加入了**版本号控制**等,通信用的HTTPS安全协议的通信。
- 利用HTTP状态码来传达执行结果和失败原因。
- 查询字符串协商，返回json格式。
#### Validate(参数校验)
- 参数效验主要用的是tp5中验证器。
- 将验证器抽象出一个验证层使代码更简洁具有拦截器的作用
- 具体实现请查看：https://liruoning.cn/2019/12/31/11-tp5-validate/#mores
#### Exception(异常处理层)
异常处理在接口编写中扮演着一个不可替代的作用。
小程序中，主要将异常分为两大类：
- 由于客户的行为导致的异常。  
**例:**  
没有通过验证器，没有查询到结果。  
**特性：**  
1.通常不记录日志。    
2.需要向用户返回具体的信息。  
- 服务器自身产生的异常。      
**例:**  
代码错误，调用外部接口错误。  
**特性：**      
1.通常记录日志  
2.不向客户端返回具体信息。  
- 具体实现请查看：https://liruoning.cn/2020/01/02/12-tp5-Exception/   
#### Token令牌身份验证实现流程
- 小程序端携带code请求服务器端getToken接口。
- getToken通过code去请求微信服务器获取openid和session_key。
- 存储openid记录到数据库。
- 生成Token作为key值 将openid,uid。等相关数据存入缓存设置有效期。
- 具体实现请查看：http://liruoning.cn/2020/01/02/13-tp5-token/
### 实现的接口功能  
- 首页轮播图以及精品推荐的展示

![](http://xy.liruoning.cn/images/bst-1.png)
- 分类页面的展示，实现（按朝代，时间）**分类**和**点赞**、**加入书架**的功能。

![](http://xy.liruoning.cn/images/bst-2.png)
- 搜索功能有搜索历史和热门搜索的展示。

![](http://xy.liruoning.cn/images/bst-3.png)
- 个人中心页面展示  

![](http://xy.liruoning.cn/images/bst-4.png)
- 内容页的展示（以互动的方式向用户展示内容）

![](http://xy.liruoning.cn/images/bst-5.png)
### 结言
以上就是基本内容了感谢你的阅读🤗。