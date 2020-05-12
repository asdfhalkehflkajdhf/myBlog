<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );


		if($adminOtp!=""){
			echo '<a href="./?i=-1&m='.$g_article_add.'&u='.$g_user_name.'">新建</a>';
		}
?>

		<div class="row">
		
			<?php
				$res = blog_db::getRecord();
				//print_r($res);
				foreach ($res as $k=>$v) {
					echo '<div class="col-sm">';
					echo '<h2>'.$g_type[$k]['name'].'</h2>';
					echo '<ul >';
					foreach ($v as $t=>$itemList) {
						echo '<h4>'.$t.'</h4>';
						foreach ($itemList as $item) {
							echo '<li><a  class="font-weight-bold text-reset"  href="./?i='.$item['id'].'">'.transform_html($item['title']).'</a> <small class="font-weight-light">'.$item['month'].'-'.$item['day'].'</small>';
							if($adminOtp!=""){
								echo ' <a href="./?i='.$item['id'].'&m='.$g_article_mod.'&u='.$g_user_name.'"><i class="fa fa-edit fa-fw"></i></a>';
							}
							echo '</li>';
						}
					}
					echo '</ul >';
					echo '</div>';
				}
								
			?>
				

		</div>
		<?php
			if($adminOtp!=""){
				echo '<a href="./">返回阅读模式</a>';
			}		

		?>
		<hr>