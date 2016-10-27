<?php
                      
/*
$passwordHash = password_hash('toyohasi', PASSWORD_DEFAULT);
echo $passwordHash;
//$2y$10$nGmvhabKuzpuqylap2r60uuHlX39hXA5romiyaSYJlXIMkXKe.bq2

if (password_verify('toyohasi', $passwordHash)) {
    // パスワードが一致した
    echo "一致しました。";

} else {
    // パスワードが一致しなかった
}
*/


if(pass_pare('toyohassi','$2y$10$nGmvhabKuzpuqylap2r60uuHlX39hXA5romiyaSYJlXIMkXKe.bq2')){
	echo "照合完了";
}else{
	echo "照合X";
}


