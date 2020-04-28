<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );
//读取文件内容
$file = 'res/head.txt';
if(file_exists($file)){
	$current = file_get_contents($file);
}else{
	$current = "";
}
?>


	<h1 class="bd-title"><?php echo $g_title;?></h1>
	<div class="m-auto m-t-30">
		<?php echo $current;?>
	</div>
	<hr>
