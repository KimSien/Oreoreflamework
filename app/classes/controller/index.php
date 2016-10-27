<?php

Page::get(function(){

	//ビューに渡す場合

	$posts = Item::db()->get_Data_All();

	View::inc(["test"=>"テスト中",'posts'=>$posts]);

},1);

