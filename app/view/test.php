<?php
//大事なのはテストしたいのはこのtestだということ。
//しかし、ArtInterface　classに依存している     
class Test{

	private $model;

	function __construct(ArtInterface $model = null){

		$this->model = $model;

	}

	function get(){
		echo "test";
		print_r($this->model);

	}

}

//ここはのちほど実装する
	interface ArtInterface{}
	class ArtModel implements ArtInterface {}


//これで newしても問題は出ない。
$test = new Test();
$test->get();



