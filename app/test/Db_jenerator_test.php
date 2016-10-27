<?php
//comment test
$db_j = new Db_jenerator();


$db_j->addsql("no",'INT',0,1);
$db_j->addsql("user_id","TEXT");
$db_j->addsql("user_pass","TEXT");
$db_j->addsql("user_auth","TEXT");
$db_j->addsql("user_nyuusatulist_id","INT");
$db_j->addsql("user_watchitem_id","INT");
$db_j->addsql("user_haveitem_id","INT");
$db_j->addsql("user_kojinjyouhou_id","INT",1);



echo $db_j->printsql();

echo "<br>";
echo "<br>";

print_r($db_j->printcdata());


echo "<br>";
echo "<br>";


