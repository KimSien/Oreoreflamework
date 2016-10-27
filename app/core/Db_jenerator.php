<?php


class Db_jenerator{
	
	private $sql;
	private $cdataitems;

	private $forms;

	function __construct(){
		$this->sql="";
				$this->cdataitems="";
		$this->forms="";
	}

	//arrayで渡すバージョン
	//$db_jenerator->makesql(array("name"=>"INT","title"=>"TEXT"));
	/*
	function makesql($array){

	$count= count($array);
	$i=0;

		//INt,TEXT,TIMESTAMP
		foreach ($array as $key => $value) {

			$this->sql .= "`".$key."` ".$value;

			$i++;
			if($i != $count)
				$this->sql .=",";

		}

	return $sql;

	}
	*/


	//分けて設定できるバージョン
	//デフォＩＮＴ
	function addsql($rowname,$type="INT",$endoption=0,$primary_key=0){

		//cdataitems
		//$this->cdataitems[] = '"'.$rowname.'"';
		$this->cdataitems[] = $rowname;

		//sql
		$this->sql .= "`".$rowname."` ".$type;


			if($primary_key == 1)
				$this->sql .=" NOT NULL PRIMARY KEY";


			if($endoption!=1){
				$this->sql .=",";
						//$this->cdataitems .=","; 
			}

	}

	function printsql(){
		return "(".$this->sql.");";
	}
	function printcdata(){
		//return "(".$this->cdataitems.")";
		return $this->cdataitems;

	}







	//フォームヘルパー
	function formhelper($rowname,$def="",$type="TEXT"){

$this->forms .= <<< EOF
<div>
{$rowname} : 
<INPUT TYPE='{$type}' name="{$rowname}"
 value="{$def}">
</div>
EOF;

	}

	function formhelper_print(){

		$itiji = '<form action="" method="post">';
		$itiji .= $this->forms;

		
		$itiji .= '<input type="submit" value="投稿" name="submit2">';

		$itiji .= "</form>";

		return $itiji;

	}



}



