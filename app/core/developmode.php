<?php

//error

	echo "<br>";
	
	if ($_POST) {
	  $kv = array();
	  foreach ($_POST as $key => $value) {
	    $kv[] = "$key=$value";
	  }
	  $query_string = join("&", $kv);
	 echo '<br>POST値：'.$query_string;
	}

	if ($_GET) {
	  $kv = array();
	  foreach ($_GET as $key => $value) {
	    $kv[] = "$key=$value";
	  }
	  $query_string = join("&", $kv);
	 echo '<br>GET値：'.$query_string;
	}




	echo " <hr>";
	$mem = memory_get_usage();
	$mem = number_format($mem);
	print("使用Memory:{$mem}");

	echo "<br>最大Memory:";

	print_r(memory_get_peak_usage());

	echo "<div style='clear:both;height:200px;'></div>";