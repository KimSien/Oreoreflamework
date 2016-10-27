<?php

//paging(現在のリストのページ、リストの最大のページ、一覧にできるリストの幅)

class Paging{
	
private $page = 1;
private $maxed = 1;

	static public function getpage(){
		if(isset($_GET['page'])){
		$page = strip_tags($_GET['page']);
		}else{
			$page=0;
		}


		return $page;
	}

	function paging($genzai=1,$max=1,$list=5,$tags='li',$page='page'){
		$start=1;
		$goal=$max;

		$this->maxed = $max-1;

		if($list >= $max){

		}elseif(($list+$genzai) >= $max){
			$start=$max-$list;
		}else{
			$start=$genzai;
			$goal=$genzai+$list;
		}

		$this->page = $genzai; 

  		$this->pager_list($start,$goal,$tags,$page);
	}






	function pager_list($start,$goal=1,$tags='li',$page='page'){

		$next_repeat = $goal - $start +1;

	if($goal > 1):

		echo $this->pager_temp2("0",$tags,$page,"1");

			//ループ部分
			for( $i=$start; $i < $goal ; $i++){
				echo $this->pager_temp($i,$tags,$page);
			}

		echo $this->pager_temp2($this->maxed,$tags,$page,"最後");

	endif;

	}











		function pager_temp2($number,$tags='li',$page='page',$word){
		//return '<'.$tags.'>'.'<a href="?page='.$number.'">' . $number . '</a>'.'</'.$tags.'>';

			if($number == $this->page){
				$pclass = " class='genzai'";
			}else{
				$pclass = "";
			}

		return '<'.$tags.$pclass.'>'.'<a href="?'.$page.'='.$number.'">' . $word . '</a>'.'</'.$tags.'>　';

		}










	function pager_temp($number,$tags='li',$page='page'){
	//return '<'.$tags.'>'.'<a href="?page='.$number.'">' . $number . '</a>'.'</'.$tags.'>';

		if($number == $this->page){
			$pclass = " class='genzai'";
		}else{
			$pclass = "";
		}

	return '<'.$tags.$pclass.'>'.'<a href="?'.$page.'='.$number.'">' . ( $number + 1 ) . '</a>'.'</'.$tags.'>　';

	}






}