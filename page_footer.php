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
					<a target="_blank" href="http://www.beian.miit.gov.cn" rel="nofollow" >&nbsp;京ICP备18030752号-2&nbsp;</a> 
                        <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=13072802000022" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">&nbsp;<img src="../res/img/备案图标.png" style="float:left;"/>冀公网安备 13072802000022号&nbsp;</a>
				</p>
			</div>
		</footer>
