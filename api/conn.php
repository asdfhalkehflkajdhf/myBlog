<?php
require_once( 'g_config.php' );

/*****************************
*数据库连接
*****************************/

class connent_db extends PDO {
	///////////////////////SQLite3//////////////////////

	var $g_tb_articles="CREATE TABLE IF NOT EXISTS tb_articles (
		id      INTEGER       PRIMARY KEY AUTOINCREMENT,
		title   VARCHAR (256) NOT NULL,
		content TEXT          NOT NULL,
		cTime   DATETIME,
		modTime DATETIME,
		type    INTEGER       DEFAULT ( -1),
		read    INTEGER       DEFAULT (0)
	);";
	var $g_tb_statistics= "CREATE TABLE  IF NOT EXISTS tb_statistics (
	id       INTEGER  PRIMARY KEY AUTOINCREMENT,
	ipaddr   VARCHAR,
	datetime DATETIME
	);";
	var $db_file="res/blog.db";
	
	function __construct(){
		if(file_exists($this->db_file)){
			parent::__construct("sqlite:".$this->db_file);
			
		}else{
			parent::__construct("sqlite:".$this->db_file);
			//新建表 ,,没有影响记录，直接返回值为0.并不知道有没有报错
			$this->exec($this->g_tb_articles);
			$this->exec($this->g_tb_statistics);
			//print_r( $this->errorCode() );
			//print_r( $this->errorCode() );
		}

	}
	function __destruct(){
	}
}




/*****************************
*数据库操作
*****************************/
final class blog_db{

	function getRecord(){
		//打开数据库

		$conn =new connent_db();
				
		$sql = "SELECT id,title,cTime,modTime,read,type from tb_articles order by cTime desc,type";
		//echo $sql;
		$res=[];
		
		foreach ($conn->query($sql) as $row) {
			$item=[];
			$item['id']=$row['id'];
			$item['title']=$row['title'];
			
			$item['cTime']=$row['cTime'];
			$item['modTime']=$row['modTime'];
			$item['read']=$row['read'];
			$item['type']=$row['type'];
			
			$t=explode(" ",$row['cTime'])[0];
			$t=explode("-",$t);
			//print_r($t);
			$item['day']=$t[2];
			$item['month']=$t[1];
			$item['year']=$t[0];
			
			$res[$item['type']][$item['year']][]=$item;
		}
		return $res;
	}
	
	
	
	function getContent($id){
		//打开数据库
		$conn =new connent_db();
				
		$sql = "SELECT id,title,content,cTime,modTime,read,type from tb_articles where id = {$id} ";
		//echo $sql;
		$res=[];
		foreach ($conn->query($sql) as $row) {
			$res['id']=$row['id'];
			$res['title']=$row['title'];
			$res['content']=$row['content'];
			$res['cTime']=$row['cTime'];
			$res['modTime']=$row['modTime'];
			$res['read']=$row['read'];
			$res['type']=intval($row['type']);
		}
		return $res;
	}	
	
	function addArticles($title, $content, $type){
		//打开数据库
		//subject, region, grade_class, year, grade, degree_type
		$conn =new connent_db();
		
		$sql = "insert into tb_articles (title,content,cTime,modTime,type)values('{$title}','{$content}',datetime('now'),datetime('now'),{$type});";
		
		$res=[];
		$ret = $conn->exec($sql);
		if($ret<=0){
			
			//PDO
			print_r($conn->errorInfo());
		} else {
			//echo $conn->changes(), " Record deleted successfully\n";
		}
		// PDO
		$res = $conn->lastInsertId();
		// SQLite3
		// $res = $conn->lastInsertRowID();

		return $res;
	}

	function modArticles($id, $title, $content, $type){
		//打开数据库
		//subject, region, grade_class, year, grade, degree_type
		$conn =new connent_db();
		
		$sql = "update tb_articles set title='{$title}', content='{$content}', type={$type}, modTime=datetime('now') where id={$id}";
		
		$res=false;
		$ret = $conn->exec($sql);
		if($ret<=0){
			
			//PDO
			print_r($conn->errorInfo());
			
		} else {
			//echo $conn->changes(), " Record deleted successfully\n";
			$res=true;
		}
		return $res ;
	}	

	function delArticles($id){
		//打开数据库
		$conn =new connent_db();
		$sql = "DELETE FROM tb_articles WHERE id={$id} ";
		return $conn->exec($sql);
	}	


	function upArticlesRead($id){
		//打开数据库
		$conn =new connent_db();
		
		$sql = "update tb_articles set read=read+1 where id={$id}";
		
		return $conn->exec($sql);;
	}

	function upStatistics(){
		//PDO insert 有问题，不研究了
		/*
		$db = new SQLite3('statistics.db');

		if(!$db){
			echo $db->lastErrorMsg();
		} else {
			//echo "Opened database successfully\n";
			$sql = "CREATE TABLE  IF NOT EXISTS tb_statistics (
			id       INTEGER  PRIMARY KEY AUTOINCREMENT,
			ipaddr   VARCHAR,
			datetime DATETIME
			);";
			$ret = $db->exec($sql);
		}
		$ip_addr = $_SERVER['REMOTE_ADDR'];//当前用户 IP 。 
		$sql = "insert into tb_statistics (ipaddr, datetime)values('{$ip_addr}', datetime('now'));";

		$ret = $db->exec($sql);
		if(!$ret){
			echo $db->lastErrorMsg();
		} else {
			//echo $db->changes(), " Record deleted successfully\n";
		}
		
		$res = $db->lastInsertRowID();
		$db->close();
		return $res;
		*/
		///////////////////
		$conn =new connent_db();
		
		$ip_addr = $_SERVER['REMOTE_ADDR'];//当前用户 IP 。 
		$sql = "insert into tb_statistics (ipaddr, datetime)values('{$ip_addr}', datetime('now'));";
		
		$ret = $conn->exec($sql);
		if(!$ret){
			echo $conn->lastErrorMsg();
		} else {
			//echo $db->changes(), " Record deleted successfully\n";
		}
		
		$res = $conn->lastInsertRowID();

		return $res;

	}	
}
    /*转换sql语句的参数,
    */

function transform_sql($str){
	return addslashes($str);
}
function transform_html($str){
	return stripcslashes($str);
}
///////////////////////email//////////////////////


// 检查邮箱格式
function checkEmail($email)
{
	$res = filter_var($email, FILTER_VALIDATE_EMAIL);
	if(is_bool($res)){
		return false;
	}
	return true;
}




