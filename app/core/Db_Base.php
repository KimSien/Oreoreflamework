<?php

const MAX_REACH =10000;


class Db_Base{

	private $pdo;

	private $tablename;
	private $sql_set;
	private $array_data;
	private $test_data;
	private $primary_key;

	private $ques;
	private $ques2;
	
	private $sql_array;




	public $max;
	public static $maxs;

function getmax(){

	return self::$maxs;

}



			//private変数のセット
			function set_private($tablename,$sql_set,$array_data,$test_data,$primary_key){

			$this->tablename = $tablename;
			$this->sql_set = $sql_set;
			$this->array_data = $array_data;
			$this->test_data = $test_data;
			$this->primary_key = $primary_key;

			}


	//コンストラクタ
	function __construct($tablename,$sql_set,$array_data,$test_data,$primary_key){

		$this->set_private($tablename,$sql_set,$array_data,$test_data,$primary_key);

		$this->to_Data_Ques();


		//データベースの確認
		try{
		$this->pdo = new PDO('mysql:dbname=' . S_DBname.';host='.S_host,S_DBid,S_DBpass);
		//echo "success";

			//table create
			$this->create_Table();
			//データベースが空の場合のみテストデータをセットする
			//$this->test_dataset();

		} catch (PDOException $e) {
		//echo "error" .$e->getMessage();
		echo "DB_DRRORs";
		exit();
		}


	} //__construct



		//table作成
		function create_Table(){


		$sql="CREATE TABLE IF NOT EXISTS `".$this->tablename."` " .$this->sql_set;

		$test = $this->pdo->prepare($sql);
		$test -> execute();

		} //create_DB











		//data_ques 配列をクエリーに変えてsqlに入れる
		function to_Data_Ques(){

			$sql_set2 ="";
			$ques ="";
			$x = 0;
			foreach ($this->array_data as $value) {
				if($x!=0){
					$sql_set2 .= ",";
					$ques .= ",";
				}
				$sql_set2 .= $value;
				$ques .= "?";
				$x++;
			}

			$this->sql_array = $sql_set2;
			$this->ques = $ques;

			//echo $this->sql_array;
			//echo $this->ques;


		}






		//ホストチェック
		function val_Host(){
							//リンク元（POST元）の判定
				$host = @$_SERVER['HTTP_REFERER'];

				$str = parse_url(@$host);
				if(stristr(@$str['host'], S_SERVARNAME)){
				$check = "ok";
				}

				if(@$check=="ok"){
				return "ok";
				}

		}









			/*
				$sql = ("SELECT * FROM $this->tablename limit :offset,:limit");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindValue(':offset', 0, PDO::PARAM_INT);
				$stmt->bindValue(':limit', MAX_REACH, PDO::PARAM_INT);

				$stmt->execute();

				$this->max = count($stmt->fetchAll());
			*/





		//削除用
		function delete_DB($ids){
			//$id = strip_tags($id);
			$sql = "delete from ".$this->tablename." where ".$this->primary_key."= :ids";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':ids',$ids,PDO::PARAM_INT);
			$stmt->execute();
			//print_r($test);
			//print_r($test->fetch(PDO::FETCH_ASSOC));

			//$posts = $stmt->fetchAll();


				print_r($stmt);

			/*
			if($stmt==1):
			return "success";
			else:
			return "error";
			endif;
			*/ 
		}














		//凡庸投稿関数 プログラムが使用する
		//function post_DB($id,$title,$contents,$catid){
		function post_DB($array){
			$error="";


			if($error == ''):
			$sql = "REPLACE INTO ". $this->tablename . "(" . $this->sql_array .") VALUES(". $this->ques .")";
			
			$test = $this->pdo->prepare($sql);
			$test->execute($array);
			return "success";

			else:
				return $error;

			endif;
		}







		//凡庸投稿関数 プログラムが使用する
		//function post_DB($id,$title,$contents,$catid){

		//http://qiita.com/tabo_purify/items/2575a58c54e43cd59630

		function post_DB2($array){
			$error="";


			if($error == ''):
			$sql = "REPLACE INTO ". $this->tablename . "(" . $this->sql_array .") VALUES(". $this->ques2 .")";
			
			$test = $this->pdo->prepare($sql);
			$test->execute($array);
			return "success";

			else:
				return $error;

			endif;
		}

		//data_ques 配列をクエリーに変えてsqlに入れる
		function to_Data_Ques2(){

			$sql_set2 ="";
			$ques ="";
			$x = 0;
			foreach ($this->array_data as $value) {
				if($x!=0){
					$sql_set2 .= ",";
					$ques .= ",";
				}
				$sql_set2 .= $value;
				$ques .= "?";
				$x++;
			}

			$this->sql_array = $sql_set2;
			$this->ques2 = $ques;

			//echo $this->sql_array;
			//echo $this->ques;


		}


















						//★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★
						//凡庸書き換え用関数一部だけを書き換えるのに使う。sql_arrayをセットすること。
						//とりあえず機能制限してひとつだけ書き換え
						function replace_DB($id,$sql_array,$array){
							$error="";


							if($error == ''):

							$sql = "update {$this->tablename} set {$sql_array} =:array where {$this->primary_key} = :id";
								//echo "update {$this->tablename} set {$sql_array} =:array where {$this->primary_key} = :id";
							$stmt = $this->pdo -> prepare($sql);
							$stmt->bindParam(':array', $array, PDO::PARAM_INT);
							$stmt->bindValue(':id', $id, PDO::PARAM_INT);
							$stmt->execute();

							//$test = $this->pdo->prepare($sql);
							//$test->execute($array);
							return "success";

							else:
								return $error;

							endif;
						}







		//今回用のカスタム投稿関数 $_post[]バージョン
		//
		function post_DB_post($submit){

			
				//echo $submit;
				$test = $this->val_Host();

				/*
				if ($test != "ok"){
				echo "not server";
					exit();
				}
				*/


				if(@$_POST["${submit}"]):

				$array = $this->array_data;
				foreach($array as $value){
						$set_data_array[] = @$_POST["${value}"];
						//echo $value.",";
				}

					print_r($set_data_array);

				// if(!$no) $error .= "no number";

				if(!@$error){
				//$pdo = new PDO('mysql:dbname=blogs01','root','toyohasi');
				$sql = "REPLACE INTO ". $this->tablename . "(" . $this->sql_array .") VALUES(". $this->ques .")";	
				$st = $this->pdo->prepare($sql);


				/* contents state */
				$st->execute($set_data_array);

				//header('LOCATION:index3.php');
				echo "success";
				//exit();

				}else{
				echo "書き込みできませんでした。<br>";
				echo $error;
				} // $error end

				endif;


		}












		//凡庸閲覧関数　primary_keyに依存
		//primary_key
		function get_Data($id,$option=0){
			$id = strip_tags($id);
			$sql = "select * from ".$this->tablename." where ". $this->primary_key ."=".$id;
			$test = $this->pdo->query($sql);



				/* $postsにデータ格納 */
				$posts = $test->fetchAll();
				//$posts = $test->fetch();


			if($posts):
			 return $posts;	
			else:
			 return ’error’;
			endif;



		}



		//今回用のカスタム全体取得用
		/*
		function get_Data_All($kensuu=2,$kaisi=0){

				$sql = ("SELECT * FROM $this->tablename limit ". $kaisi .",". $kensuu);

					$stmt = $this->pdo -> prepare($sql);
					$stmt->execute();


			$posts = $stmt->fetchAll();

			return $posts;
		}
		*/


		//今回用のカスタム 開催中
		function get_Data_All($kensuu=50,$kaisi=0){

				//max	
				$sql = ("SELECT * FROM $this->tablename limit :offset,:limit");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindValue(':offset', 0, PDO::PARAM_INT);
				$stmt->bindValue(':limit', MAX_REACH, PDO::PARAM_INT);

				$stmt->execute();

				$this->max = count($stmt->fetchAll());

				$stmt->bindValue(':offset', (int)$kaisi, PDO::PARAM_INT);
				$stmt->bindValue(':limit', (int)$kensuu, PDO::PARAM_INT);

				$stmt->execute();


			$posts = $stmt->fetchAll();

			return $posts;
		}



/*

				$sql = ("SELECT * FROM $this->tablename WHERE limit :offset,:limit");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindValue(':offset', 0, PDO::PARAM_INT);
				$stmt->bindValue(':limit', MAX_REACH, PDO::PARAM_INT);

				$stmt->execute();

				$this->max = count($stmt->fetchAll());

				$stmt->bindValue(':offset', (int)$kaisi, PDO::PARAM_INT);
				$stmt->bindValue(':limit', (int)$kensuu, PDO::PARAM_INT);

				$stmt->execute();


			$posts = $stmt->fetchAll();

			return $posts;
*/




















		//今回用のカスタム 開催中
		/*
		function get_Data_kaisai($hiduke,$hiduke_value,$kensuu=50,$kaisi=0){

				//全取得を制限
				$sql = ("SELECT * FROM $this->tablename WHERE $hiduke >= :hiduke_value limit ". $kaisi .",". $kensuu);

					$stmt = $this->pdo -> prepare($sql);
					$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
					$stmt->execute();


			/* $postsにデータ格納 */
		/*
			$posts = $stmt->fetchAll();

				//max	
				$sql = ("SELECT * FROM $this->tablename WHERE $hiduke >= :hiduke_value");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
				$stmt->execute();

				$this->max = count($stmt->fetchAll());

			return $posts;

		}
		*/


		//今回用のカスタム 開催中
		function get_Data_kaisai($hiduke,$hiduke_value,$kensuu=50,$kaisi=0){

//memory使用量Memory:438,312
//最大529928

//memory使用量Memory:438,368
//最大529576

				//max	
				$sql = ("SELECT * FROM $this->tablename WHERE $hiduke >= :hiduke_value limit :offset,:limit");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
				$stmt->bindValue(':offset', 0, PDO::PARAM_INT);
				$stmt->bindValue(':limit', 100000, PDO::PARAM_INT);

				$stmt->execute();

				$this->max = count($stmt->fetchAll());
				self::$maxs = $this->max;

				//echo $this->max."-------------------------------";

				//全取得を制限
				//$sql = ("SELECT * FROM $this->tablename WHERE $hiduke >= :hiduke_value limit ". $kaisi .",". $kensuu);

					//$stmt = $this->pdo -> prepare($sql);
					//$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
				$stmt->bindValue(':offset', (int)$kaisi, PDO::PARAM_INT);
				$stmt->bindValue(':limit', (int)$kensuu, PDO::PARAM_INT);

					$stmt->execute();


			/* $postsにデータ格納 */
			$posts = $stmt->fetchAll();

			return $posts;

		}













		//今回用のカスタム 終了分
		function get_Data_syuuryou($hiduke,$hiduke_value,$kensuu=50,$kaisi=0){

				//max	
				$sql = ("SELECT * FROM $this->tablename WHERE $hiduke < :hiduke_value limit :offset,:limit");
				$stmt = $this->pdo -> prepare($sql);
				$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
				$stmt->bindValue(':offset', 0, PDO::PARAM_INT);
				$stmt->bindValue(':limit', 100000, PDO::PARAM_INT);

				$stmt->execute();

				$this->max = count($stmt->fetchAll());
				self::$maxs = $this->max;
				
				//echo $this->max."-------------------------------";

				//全取得を制限
				//$sql = ("SELECT * FROM $this->tablename WHERE $hiduke >= :hiduke_value limit ". $kaisi .",". $kensuu);

					//$stmt = $this->pdo -> prepare($sql);
					//$stmt->bindParam(':hiduke_value', $hiduke_value, PDO::PARAM_STR);
				$stmt->bindValue(':offset', (int)$kaisi, PDO::PARAM_INT);
				$stmt->bindValue(':limit', (int)$kensuu, PDO::PARAM_INT);

					$stmt->execute();


			/* $postsにデータ格納 */
			$posts = $stmt->fetchAll();

			return $posts;

		}


				
				


		//最新のＩＤを取得 ワードプレスのように大きい数を発行していく
		//新規作成などで使用
		function get_Maxid(){
			$sql="SELECT ". $this->primary_key ." FROM ".$this->tablename." ORDER BY ". $this->primary_key ." DESC LIMIT 1";
		
			$test=$this->pdo->query($sql);
			$max_id =$test->fetchAll();

			//test
			//print_r($max_id);

			foreach ($max_id[0] as $key => $value) {
				// $max = $key." as ".$value;
				 $max = $value;

			}

			return $max; 

		}
















// 以下検索用



		//今回用のカスタム 検索用　文字列
		function get_Data_Find($keys,$keys_value,$genmitu=0){

			if($keys=="") $keys = $this->primary_key;

			if($genmitu==0):
			//全取得あいまい
			$sqls="SELECT * FROM `".$this->tablename."` WHERE `".$keys."` LIKE '%".$keys_value."%'";
			else:
			//取得厳密
			$sqls="SELECT * FROM `".$this->tablename."` WHERE `".$keys."` LIKE '".$keys_value."'";
			endif;

			//$sqls="SELECT * FROM `".$this->tablename."` WHERE `".$keys."` LIKE '%".$keys_value."%'";
			//echo $sqls;
			$test = $this->pdo->query($sqls);

				//$test = $this->pdo->query("SELECT * FROM `test_test` WHERE `title` LIKE 'reqrewq'");


			/* $postsにデータ格納 */
			$posts = $test->fetchAll();

			if($posts):
			 return $posts;	
			else:
			 return false;
			endif;


		}








		//今回用指定の記事を取る 単記事 、数字指定限定
		function get_Data_id($keys,$keys_value){

				//bindparam用に


				//全取得を制限
				$sql=("SELECT * FROM $this->tablename WHERE ${keys} = :keys_value LIMIT 1");

					$stmt = $this->pdo -> prepare($sql);
					$stmt->bindParam(':keys_value', $keys_value, PDO::PARAM_INT);
					$stmt->execute();


			/* $postsにデータ格納 */
			$posts = $stmt->fetchAll();

			/* 空の場合 */
			//print_r($posts);
			if(!$posts) echo "新規作成";

			return $posts;

		}

				/*
							$sql = "update {$this->tablename} set {$sql_array} =:array where {$this->primary_key} = :id";
								//echo "update {$this->tablename} set {$sql_array} =:array where {$this->primary_key} = :id";
							$stmt = $this->pdo -> prepare($sql);
							$stmt->bindParam(':array', $array, PDO::PARAM_INT);
							$stmt->bindValue(':id', $id, PDO::PARAM_INT);
							$stmt->execute();

				*/

//上記２つは統合が可能













}







?>