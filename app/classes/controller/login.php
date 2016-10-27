<?php

Page::get(function(){

	$message = "ログインしてくださいね。";
	View::inc(["mes01"=> $message ]);

});

Page::post(function(){



	//post
	$username = U_POST('name');
	$userpass = U_POST('pass');

	$post = User::db()->get_Data_Find('name',$username);
	$pass_hush =  $post[0]['pass'];

	//print_r($post);

	
		if(pass_pare($userpass,$pass_hush)){
			//echo "照合完了";

			SessionDb::set('login','login');
			redirect('index',0,0);

		}else{

			SessionDb::set('login','');
			//echo "照合X";
			$message = "ログインできません。IDもしくはPASSが間違ってます。";

		}
	

	View::inc(["mes01"=> $message]);

});
