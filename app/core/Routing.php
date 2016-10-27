<?php
class Routing{

	static public $exist = 0;
	static public $exist_page = 0;


	static function get_url(){

		if(isset($_GET['url'])){

			$params = explode('/', $_GET['url']);
				// /がついてない場合の処理
			
				if(count($params)==1){

					if($params[0]==null){

					$params=array('index');

					}else{

					//header('Location: http://localhost/k_auc/index/');
					header('Location: http://localhost'. $_SERVER["REQUEST_URI"] .'/');
					}
				}; 


			$root_model = array_shift($params);

		}else{

			if($_SERVER['REQUEST_URI']==('/'.K_RootingBase)){
					header('Location: http://localhost/'. K_RootingBase .'index/');
			}else{
				$root_model='index';
			}

		}


	return $root_model;
	}




	static function Cinclude($subfolder='classes/model',$array=[],$extension='php'){

		if(self::$exist==0){
			$root_model = self::get_url();

				if(is_file(K_AppBase.$subfolder.'/'.$root_model.'.'.$extension)){



						//ビューに渡す変数
						if(View::$array != null){
							extract(View::$array);
						}


				
				require_once (K_AppBase.$subfolder.'/'.$root_model.'.'.$extension);
				//$K_error_page = false;
				self::$exist_page = 1;
				return true;

				}else{

				return false;
				if(self::$exist_page != 0){self::$exist_page = 1;}

				}
		}else{
			self::$exist_page = 1;
			return true;
		}

	}




	static function O_url($original,$callback){
	$root_model = self::get_url();

		if($original==$root_model){
		call_user_func($callback);
		self::$exist = 1;
		self::$exist_page = 1;
		return true;
		}else{
		return false;
		}

		
	}

}