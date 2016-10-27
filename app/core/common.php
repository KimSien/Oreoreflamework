<?php

/*　----------------------------------------------------------------------------------
関数系統　
*/
	//パスワード用
	//暗号化
	function pass($password){
	$pass = password_hash($password, PASSWORD_DEFAULT);
	return $pass;
	}

	//デコード
	function pass_pare($password,$passwordHash){
		if(password_verify($password, $passwordHash))
		return true;
	}



function U_POST($value,$op1=1,$op2=0){

	//01- $op1で動作切り替えたり、バリデーション入れたりでも。
	if($op1==1):
		$val = isset($_POST[$value]) ? $_POST[$value] : false ;
		$val = is_string($val) ? $val : false ;

		//filter_inputに変更も
		//http://php.net/manual/ja/function.filter-input.php
		//PHP７なら&&でも
	elseif($op1==2):
		$val = isset($_GET[$value]) ? $_GET[$value] : false ;
		$val = is_string($val) ? $val : false ;
	//
	endif;



	//02- $op2で不要なタグの除去・簡易的なＸＳＳ対策
	//エスケープ漏れ、ダブルエスケープが生じる可能性がある為、非推奨
	if($op2==1):	
	$val = htmlspecialchars($val, ENT_QUOTES);
	else:
	//
	endif;




	//03- 値を返す
	return $val;


}









function converthtml($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}





//validation foundation
function K_hsp($value1){
		//arrayをhtmlspecialcharsで

		$values = array();

		foreach($value1 as $val){
		$values[] = K_mbs(htmlspecialchars($val));
		}
		//print_r($values);
		return $values;
}








//特殊記号除去、小文字に変換
function K_mbs($value2){

	//数字も除去
	$value2 = preg_replace("/[^ぁ-んァ-ンーa-zA-Z0-9一-龠０-９\-\r]+/u",'' ,$value2);

	//数字は有効
	//$news = preg_replace("/[^ぁ-んァ-ンーa-zA-Z一-龠０-９\-\r]+/u",'' ,$value2);
	$value2 = mb_strtolower($value2, 'UTF-8');
	$value2 = htmlspecialchars($value2, ENT_QUOTES);
	return $value2;
}


function K_preg_int($val){
	 if (preg_match("/^[0-9]+$/", $val)) {
	return true;
	}
}








function redirect($controller_and_query,$num=0,$byou=2) {
 
  $controller_and_query = htmlspecialchars($controller_and_query, ENT_QUOTES, 'UTF-8'); //など


 if($num==2){
	$session = new SessionDb(); 
		if($session->get('genzai_url')){
		  $url = $session->get('genzai_url');

		}else{
		  //$url = 'http://'.$_SERVER['HTTP_HOST'].$controller_and_query;
		  $url = K_ServerAdress.K_RootingBase.$controller_and_query;
		}

	}else{
	 $url = K_ServerAdress.K_RootingBase.$controller_and_query;
	}


  $errors[0] = <<<END
<meta charset="utf-8">
ページありません。
{$byou}秒後に <a href="$url">$url</a> に移動します。<br />
END;

  $errors[1] = <<<END
<meta charset="utf-8">
ログインできません。
{$byou}秒後に <a href="$url">$url</a> にログイン画面に戻ります。<br />
END;


  $errors[2] = <<<END
<meta charset="utf-8">
ログインします。
{$byou}秒後に <a href="$url">$url</a> に移動します。<br />
END;


$byou = $byou * 1000;
   
  $contents = <<<END
<script type="text/javascript">
<!--
setTimeout(function(){
  location.replace('$url');
}, {$byou});
-->
</script>
END;

  //必要なら
  //$contents = mb_convert_encoding($contents, 'EUC-JP', 'auto');
   
  echo $errors[$num].$contents; //これを return して応用する
  exit;                          
}


