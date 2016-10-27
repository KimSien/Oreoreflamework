<?php
class Page{

		static function get($func,$type=0){
				//if($_GET == null){
					if($type==0){
						call_user_func($func);
					}else{
						if($_POST == null)
						call_user_func($func);
					}
				//}
		}


		static function post($func){
			if(self::ck_post()){
				if($_POST != null)
				call_user_func($func);
			}
		}


			static function create($func){
				if(self::ck_post()){
					if($_POST['_method'] == 'create')
					call_user_func($func);
				}
			}

			static function update($func){
				if(self::ck_post()){
					if($_POST['_method'] == 'update')
					call_user_func($func);
				}
			}

			static function delete($func){
				if(self::ck_post()){
					if($_POST['_method'] == 'delete')
					call_user_func($func);
				}
			}

	static function ck_post(){
		return	isset($_POST['_method']);
	}

}