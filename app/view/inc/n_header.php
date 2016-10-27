<div style="background:#F5A325;color:#fff;padding:10px;">
	<span style="font-size:2em;">Oreoreフレームワーク</span>
</div>


<div style="background:#CCC6C2;color:#fff;padding:5px 10px;">
<a href="../index/">TOP</a>

<?php
 $userlogin = SessionDb::get('login'); 

 if($userlogin=='login'){
  echo "　/ login中";
  echo "　/ <a href='../logout/'>logout</a>";
  
 }else{
  echo "　/ <a href='../login/'>loginする</a>";
 }


?>
　　
</div>


