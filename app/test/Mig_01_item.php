<?php
//--------------------------------------------------------------------------------
	//アイテムー関係
	$db_j = new Db_jenerator();


	$db_j->addsql("no",'INT',0,1);

	$db_j->addsql("title","TEXT");
	$db_j->addsql("contents","TEXT");

	$db_j->addsql("category_id","INT");

	$db_j->addsql("create_at","TIMESTAMP");
	$db_j->addsql("update_at","TIMESTAMP",1);


		$C_tablename ="bb_item_data";
		$c_createtable_sql = $db_j->printsql();
		$c_dataitems = $db_j->printcdata();
		$c_testitems = array("1","タイトル","コンテンツ内容",1,"2016-01-01 00:00:01","2016-01-01 00:00:01");
		$c_primary_key = "no";

	$posts = new Db_Base($C_tablename,$c_createtable_sql,$c_dataitems,$c_testitems,$c_primary_key);
	


//--------------------------------------------------------------------------------
// ＳＥＥＤ

$content3 = <<< EOM
コンテンツ内容３番目
<img src="../src/test1.jpg">


EOM;

$posts->post_DB(array("0","タイトル0","コンテンツ内容",0,"2016-01-01 00:00:01","2016-01-01 00:00:01"));
$posts->post_DB(array("1","タイトル1","コンテンツ内容",1,"2016-01-01 00:00:02","2016-01-01 00:00:02"));
$posts->post_DB(array("2","タイトル2",$content3,1,"2016-01-01 00:00:03","2016-01-01 00:00:03"));



//簡易的なフォームヘルパー
$posts-> post_DB_post('submit2');

$db_j->formhelper("no",1);
$db_j->formhelper("title","testid");
$db_j->formhelper("contents","testpass");
$db_j->formhelper("category_id",1);
$db_j->formhelper("create_at",1);
$db_j->formhelper("update_at",1);

echo $db_j->formhelper_print();



//全件取得など。
echo '全 取得';
$st = $posts->get_Data_All();
print_r($st);









