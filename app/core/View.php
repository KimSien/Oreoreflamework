<?php

class View{

	public static $array =[];


	static function inc($array){

		self::$array = $array;

	}


	static function put($array,$func){

		call_user_func($func,$array);

	}



}



