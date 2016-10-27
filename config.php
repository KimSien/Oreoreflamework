<?php

// エラー出力しない場合
//ini_set( 'display_errors', 0 );

// エラー出力する場合
ini_set( 'display_errors', 1 );




//テスト環境利用
const error_check = 1;



//ユーザー環境
const K_RootingBase = "k_auc_git/";
const K_ServerAdress = "http://localhost/";


//publicより上に置く場合はここを調整
require_once("app/app_config.php");

//databaseコンフィグ以下の形式で作成してください。
/*
	define('S_host',"localhost"); //DB環境
	define('S_DBid',"****"); //DBアクセスユーザー
	define('S_DBname',"****"); //DBデータベース名
	define('S_DBpass' , "****"); //DB_PASS

	define('S_SERVARNAME' , "****"); //リファラー用
*/
require_once("app/db_config.php");
