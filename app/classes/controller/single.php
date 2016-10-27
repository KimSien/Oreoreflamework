<?php

Page::get(function(){

	//ビューに渡す場合
	$pageid = U_POST("page",2);

	$posts = Item::db()->get_Data_Find('no',(int)$pageid);

	View::inc(["test"=>"シングルページ",'posts'=>$posts]);

},1);

