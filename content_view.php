<!DOCTYPE html>
<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );


?>

		<div id="articleContent">
			<!-- 内容 -->
			<?php
			require_once( 'api/g_config.php' );
			require_once( 'api/conn.php' );
				blog_db::upArticlesRead($articleId);
				$res = blog_db::getContent($articleId);
				echo "<h1>".$res['title']."</h1>";
				echo '<ul class="list-inline">';
				echo '<li class="list-inline-item "><small class="font-weight-light">分类：'.$g_type[$res['type']]['name'].'</small></li>';
				echo '<li class="list-inline-item "><small class="font-weight-light"> / 创建时间：'.$res['cTime'].'</small></li>';
				echo '<li class="list-inline-item "><small class="font-weight-light"> / 修改时间：'.$res['modTime'].'</small></li>';
				echo '<li class="list-inline-item "><small class="font-weight-light"> / 阅读数：'.$res['read'].'</small></li>';
				echo '</ul>';
		

				echo '<div id="articleContent">';
					//<!-- 内容 -->
				echo $res['content'];	
				echo '</div>';
			?>
			
		</div>



			
		<a href="/">返回索引</a>
		<hr>
