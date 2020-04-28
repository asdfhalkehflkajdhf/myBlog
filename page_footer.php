<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );
?>



		<footer class="footer navbar-fixed-bottom ">
			<div class="row">
				<?php 
					foreach($g_footer as $key => $itemList){
						echo '<div class="col-sm">';
						echo '<h4>'.$key.'</h4>';
						echo '<ul>';
						foreach($itemList as $item){
							if($item['link']){
								echo '<li><a target="_blank" href="'.$item['href'].'">'.$item['text'].'</a></li>';
							}else{
								echo '<li>'.$item['text'].'</li>';
							}
						}
						echo '</ul>';
						echo '</div>';
					
					}
				?>
						
			</div>
			<div class="row">
				<p class="m-auto">
					©️2019-<?php echo date("Y");?> <a href="/"><?php echo $g_author;?></a> blog
				</p>
			</div>
		</footer>
