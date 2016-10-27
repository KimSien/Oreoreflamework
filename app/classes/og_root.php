<?php

//オリジナルルートの登録

		//$K_error_page = false;
		//オリジナルルートの登録
		Routing::O_url("testtest",function(){
			echo "testtesttestルートに対して処理をする";
		});




		//logoutはこちらで実装
		Routing::O_url("logout",function(){
			SessionDb::set('login','');
			SessionDb::del();
			redirect('login');
		});
