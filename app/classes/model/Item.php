<?php

class Item{

	//public static $db_data;

	static function db(){

	//ユーザー関係
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
	return $posts;

	//print_r($this->db_data->get_Data_All());

	}




}

