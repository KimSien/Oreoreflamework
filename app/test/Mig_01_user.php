<?php
//--------------------------------------------------------------------------------
//ユーザー関係 マイグレーション
$db_j = new Db_jenerator();


	$db_j->addsql("no",'INT',0,1);
	$db_j->addsql("name","TEXT");
	$db_j->addsql("pass","TEXT");

	$db_j->addsql("create_at","TIMESTAMP");
	$db_j->addsql("update_at","TIMESTAMP",1);


		$C_tablename ="bb_user_data";
		$c_createtable_sql = $db_j->printsql();
		$c_dataitems = $db_j->printcdata();
		$c_testitems = array("0","test","test","2016-01-01 00:00:01","2016-01-01 00:00:01");
		$c_primary_key = "no";

	$posts = new Db_Base($C_tablename,$c_createtable_sql,$c_dataitems,$c_testitems,$c_primary_key);

//--------------------------------------------------------------------------------
//ユーザー関係 ＳＥＥＤ

	//パスワードハッシュ
	/* commonに移動
	function pass($password){
	$pass = password_hash($password, PASSWORD_DEFAULT);
	return $pass;
	}
	*/


$posts->post_DB(array("0","test",pass("test"),"2016-01-01 00:00:01","2016-01-01 00:00:01"));
$posts->post_DB(array("1","admin",pass("admin"),"2016-01-01 00:00:01","2016-01-01 00:00:01"));
$posts->post_DB(array("2","toy",pass("toytoy"),"2016-01-01 00:00:01","2016-01-01 00:00:01"));



//簡易的なフォームヘルパー
$posts-> post_DB_post('submit2');

$db_j->formhelper("no",1);
$db_j->formhelper("name","testid");
$db_j->formhelper("pass","testpass");
$db_j->formhelper("create_at",1);
$db_j->formhelper("update_at",1);

echo $db_j->formhelper_print();



//全件取得など。
echo '全 取得';
$st = $posts->get_Data_All();
print_r($st);









