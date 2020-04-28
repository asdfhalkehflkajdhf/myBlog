<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );

$req_data = file_get_contents("php://input");
$req_data = json_decode($req_data, true);

$type=transform_sql($req_data['type']);
$title=transform_sql($req_data['title']);
$content=transform_sql($req_data['content']);
$id=intval($req_data['id']);
$pw=transform_sql($req_data['optCode']);

$res=[
	"code"=>0,
	'msg'=>"保存成功",
	"id"=>-1
];

if($g_user_pw=="" or $g_user_pw == $pw){
	if($id==-1){
		$res['id']=blog_db::addArticles($title, $content, $type);
		if($res['id']<=0){
			$res['code']=1;
			$res['msg']="添加失败";
		}
	}else{
		if(!blog_db::modArticles($id, $title, $content, $type)){
			$res['code']=1;
			$res['msg']="添加失败";
		}
		$res['id']=$id;
	}
}else{
	$res['code']=1;
	$res['msg']="密码不正确";
}




echo json_encode($res);

?>
