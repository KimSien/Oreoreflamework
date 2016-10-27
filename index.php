<?php
		//test
		//config
		require_once("config.php");
		require_once(AutoLoadClass2.'boot.php');
		SessionDb::self_const(); 


		//common function
		require_once (K_AppBase.'core/common.php');


			//オリジナルルートを作る場合、こちらに表記
			require_once (K_AppBase.'classes/og_root.php');



				//model controller viewの呼び出し
				//Routing::Cinclude('classes/model');
				Routing::Cinclude('classes/controller');
				Routing::Cinclude('view');


		//testコード の呼び出し
		if(error_check){ Routing::Cinclude('test');}


		//ページが無い場合の処理
		if(Routing::$exist_page == 0){ echo "page not found";}


		//開発テスト
		if(error_check){ require_once (K_AppBase.'core/developmode.php'); }

?>