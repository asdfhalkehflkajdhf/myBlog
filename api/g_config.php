<?php

//用户名，进行内容编辑和管理
$g_user_name="admin";
//获取操作密码，为空时不进行密码判断
$g_user_pw="";


//设置标题
$g_title="admin";
//设置作者
$g_author="admin";
//设置头像路径，我的是在res目录下的favicon
$g_favicon_path="res/favicon.ico";

//这个是防止猜的，可以做成动态的，写到数据库
$g_article_mod="asdfasdf";
$g_article_del="asdfaasdfasdfsdfasdfsdfd";
$g_article_add="asdfaasdfasdfasdfsdfa";


//向后加，最好别删除
$g_type=array(
	1=>array("name"=>"日记","show"=>true)
	,2=>array("name"=>"代码","show"=>true)
	,3=>array("name"=>"二次元","show"=>true)
);

//底部
$g_footer=array(
	"联系方式"=>[
			array("text"=>"liuzhuchen@126.com","link"=>false,"href"=>"")
		]
	,"个人连接"=>[
			array("text"=>"github","link"=>true,"href"=>"https://github.com/asdfhalkehflkajdhf")
			,array("text"=>"csdn","link"=>true,"href"=>"https://blog.csdn.net/liuzhuchen")
			,array("text"=>"gitee","link"=>true,"href"=>"https://gitee.com/Brickie_liu")
		]
	,"友好连接"=>[
		]

);
