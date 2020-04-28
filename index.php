<!DOCTYPE html>
<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );


$articleId=-1;
$articleOtp="";
$adminOtp="";
if(isset($_GET["i"])){
	$articleId=intval($_GET["i"]);
}
if(isset($_GET["m"])){
	$articleOtp=transform_sql($_GET["m"]);
	if($articleOtp == $g_article_mod){
		$articleOtp="m";
	}elseif($articleOtp == $g_article_add){
		$articleOtp="a";
	}elseif($articleOtp == $g_article_del){
		$articleOtp="d";
	}else{
		$articleOtp="";
	}
}
if(isset($_GET["u"])){
	$adminOtp=transform_sql($_GET["u"]);
	if($adminOtp != $g_user_name){
		$adminOtp="";
	}
}



/////////////////////////////////////////

?>

<html lang="zh">
		<!--head部-->
		<?php
			require_once( 'page_header.php' );

		?>
<body>

	<div class="container">
		

		<!--head部-->
		<?php
			if($adminOtp==""){
				//不是管理员状态
				include( 'content_head.php' );							
			}else{
				if($articleOtp!=""){
					include( 'content_head.php' );							
				}else{
					include( 'content_head_edit.php' );	
				}
			}
		?>
		
		<?php
		

			if($adminOtp==""){
				//不是管理员状态
				if($articleId==-1){
					//list状态
					include( 'content_list.php' );							
				}else{
					//内容状态
					include( 'content_view.php' );							
				}
			}else{
				//是管理员状态
				
				if($articleOtp!=""){
					//内容修改
					include( 'content_edit.php' );	
				}else{
					include( 'content_list.php' );
				}
			}
		
		?>
		<!--底部-->
		<?php
			require_once( 'page_footer.php' );
		?>
	</div>

</body>


	<script src="js/index.js"></script>
    <script type="text/javascript" >
    </script>
	

</html>


