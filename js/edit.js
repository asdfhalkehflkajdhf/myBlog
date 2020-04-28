
function wangEditorInit(menu_id, body_id){
	// 编辑框初始化
	var E = window.wangEditor;
	var editor = new E('#'+menu_id,'#'+body_id);
	// editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
	
	// 创建编辑器之后，使用editor.txt.html(...)设置编辑器内容
	var editorMenus=[
    'head',  // 标题
    'bold',  // 粗体
    'fontSize',  // 字号
    'fontName',  // 字体
    'italic',  // 斜体
    'underline',  // 下划线
    'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'link',  // 插入链接
    'list',  // 列表
    'justify',  // 对齐方式
    'quote',  // 引用
    //'emoticon',  // 表情
    'image',  // 插入图片
    'table',  // 表格
    'video',  // 插入视频
    'code',  // 插入代码
    'undo',  // 撤销
    'redo'  // 重复

	];
	// 自定义菜单配置
	editor.customConfig.menus =editorMenus;
	editor.create();
	return editor;
}
// 编辑框初始化



