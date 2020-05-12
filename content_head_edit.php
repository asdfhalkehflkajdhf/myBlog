<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );


//读取文件内容
$file = 'res/head.txt';
if(file_exists($file)){
	$current = transform_html(file_get_contents($file));
}else{
	$current = "";
}


?>


	<h1 class="bd-title"><?php echo $g_title;?></h1>
	<div class="row" id="headTitle">
	
		<?php
			if($g_user_pw!=""){
				echo '<input class="form-control col-sm-2" style="color:white" type="text" placeholder="操作码" v-model="optCode" value="">';
			}
		?>
		
		<button type="button" class="btn btn-link" @click="add()"><i class="fa fa-save  fa-fw"></i></button>

	</div>
	<div  id="headContentMenu"></div>
	<div id="headContent">
		<!-- 内容 -->
	</div>
	<hr>
    <script defer language="javascript" type="text/javascript" >

// 编辑框初始化
var editor_h = wangEditorInit('headContentMenu','headContent');
editor_h.txt.html("<?php echo $current;?>");

var headTitle = new Vue({
	el: '#headTitle',
	data: {
		"optCode":"",
		"head":""
	},	
	methods:{

		add:function(){
			var _vueThis = this;
			
			let postData={
				"head":editor_h.txt.html(),
				"optCode":_vueThis.optCode
			};
			
			jQuery.ajax({
				url:"content_head_add.php",
				async:true,
				data:JSON.stringify(postData),
				dataType:"json",
				type:"post", 
				success: function(result){
					if(result.code){
						alert(result.msg)
					}else{
						_vueThis.id=result.id
						alert(result.msg)
						console.log(result.msg);
					}

				}
			});
		}
	},
	mounted: function(){
		// 初始化子页面
		var _vueThis = this;
		
	},
	created:function(){
	}

	
})
    </script>


