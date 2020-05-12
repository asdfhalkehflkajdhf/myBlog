<?php
require_once( 'api/g_config.php' );
require_once( 'api/conn.php' );

	$res = [];
	if($articleId!=-1){
		$res = blog_db::getContent($articleId);		
	}
	$content="";
	if(isset($res['content'])){
		$content=transform_html($res['content']);
	}
	$type=1;
	if(isset($res['type'])){
		$type=$res['type'];
	}
	$title="";
	if(isset($res['title'])){
		$title=transform_html($res['title']);
	}
?>


		<div class="row" id="articleTitle">
			<select class="form-control col-sm-2" id="type" placeholder="分类" v-model="type" v-on:change="selectType" value="">
				 <option v-for="(v,k) in typeOpt" :value="k" :hidden="!v.show">
				 {{ v.name }}
				 </option>
			</select>
			
			<input class="form-control col-sm-5" type="text" placeholder="标题" v-model="title" value="<?php echo $title;?>">
			
			<?php
				if($g_user_pw!=""){
					echo '<input class="form-control col-sm-2" style="color:white" type="text" placeholder="操作码" v-model="optCode" value="">';
				}
			?>
			
			<button type="button" class="btn btn-link" @click="add()"><i class="fa fa-save  fa-fw"></i></button>
			<button type="button" class="btn btn-link" @click="del()"><i class="fa fa-trash fa-fw"></i></button>

		</div>


		<nav class="navbar sticky-top navbar-light bg-light" style="z-index:20000;">
			<div  id="articleContentMenu" ></div>
		</nav>		
		<div id="articleContent">
			<!-- 内容 -->
			<?php echo $content;?>
		</div>



			
		<a href="/?u=<?php echo $g_user_name;?>">返回索引</a>
		<hr>



    <script defer language="javascript" type="text/javascript" >

// 编辑框初始化
var editor_si = wangEditorInit('articleContentMenu','articleContent');
//editor_si.txt.html('');

var articleTitle = new Vue({
	el: '#articleTitle',
	data: {
		"id":<?php echo $articleId;?>,
		"type": <?php echo $type;?>,
		"title":"<?php echo $title;?>",
		"optCode":"",
		"typeOpt":<?php echo json_encode($g_type);?>
	},	
	methods:{

		add:function(){
			var _vueThis = this;
			
			let postData={
				"id":_vueThis.id,
				"type": _vueThis.type,
				"title":_vueThis.title,
				"content":editor_si.txt.html(),
				"optCode":_vueThis.optCode
			};
			console.log(postData);
			if(postData.title=="" || postData.content=="" ){
				alert("标题内容不能为空");
				return false;
			}
			if(postData.type=="" ){
				alert("请选择类型");
				return false;
			}			
			
			jQuery.ajax({
				url:"content_add.php",
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
		},
		del:function(){
			var _vueThis = this;
			
			let postData={
				"id":_vueThis.id,
				"type": _vueThis.type,
				"title":_vueThis.title,
				"content":editor_si.txt.html(),
				"optCode":_vueThis.optCode
			};
			
			console.log(postData);
			
			jQuery.ajax({
				url:"content_del.php",
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
					history.back();

				}
			});
		},
	
		selectType:function(val){
			var _vueThis = this;
			console.log(_vueThis.type);
		}
	},
	mounted: function(){
		// 初始化子页面
		var _vueThis = this;

	console.log(321);
		
	},
	created:function(){
	}

	
})
    </script>





