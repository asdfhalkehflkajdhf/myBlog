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
	'msg'=>"删除成功",
];

if($g_user_pw=="" or $g_user_pw == $pw){
	if($id==-1){
			$res['code']=1;
			$res['msg']="信息错误";
	}else{
		if(!blog_db::delArticles($id)){
			$res['code']=1;
			$res['msg']="删除失败";
		}
	}
}else{
	$res['code']=1;
	$res['msg']="密码不正确";
}

echo json_encode($res);


?>
