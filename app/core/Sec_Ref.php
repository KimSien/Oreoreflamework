<?php

class Sec_Ref{
//class Secu_Base{

	public $referercheck;

	function __construct(){
	
		$referer = @$_SERVER["HTTP_REFERER"];
		if($referer == (K_ServerAdress.K_RootingBase."login/")):

			$this->referercheck = true;
			$_SESSION['referer'] = true;

		else:
		endif;

	}


	function check_referer(){

		if(@$_SESSION['referer']==true){
			return true;
		}else{
			return false;
		}

	}


	static function csrf(){
		echo '<input type="hidden" name="csrf" value="5454545454">';
	}


	static function method(){
		echo '<input type="hidden" name="_method" value="">';
	}


}
