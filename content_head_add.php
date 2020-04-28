<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );

$req_data = file_get_contents("php://input");
$req_data = json_decode($req_data, true);

$head=transform_sql($req_data['head']);
$pw=transform_sql($req_data['optCode']);

$res=[
	"code"=>0,
	'msg'=>"保存成功",
	"id"=>-1
];
$file = 'res/head.txt';
if($g_user_pw=="" or $g_user_pw == $pw){
	file_put_contents($file, $head);

}else{
	$res['code']=1;
	$res['msg']="密码不正确";
}




echo json_encode($res);

?>
