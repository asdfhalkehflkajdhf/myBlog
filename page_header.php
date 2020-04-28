<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );
?>



<head>
    <meta charset="utf-8">
    <title><?php echo $g_title;?></title>
	
    <meta name="author" content="<?php echo $g_author;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--  //代表该网站为Lxxyx个人版权所有。 -->
	<meta name="copyright" content="<?php echo $g_title;?>">
	
	<!-- //添加 favicon icon -->
	<link rel="shortcut icon" type="image/ico" href="<?php echo $g_favicon_path;?>">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	
	<script src="https://cdn.bootcdn.net/ajax/libs/vue/2.6.11/vue.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
	<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<?php
		if($adminOtp!=""){
			//<!-- 编辑 -->
			echo '<script type="text/javascript" src="res/wangEditor-3.1.1/wangEditor.min.js"></script>';
			echo '<link rel="stylesheet" href="res/wangEditor-3.1.1/wangEditor.min.css" type="text/css" />';
						echo '<script src="js/edit.js"></script>';

		}	
	?>

</head>
