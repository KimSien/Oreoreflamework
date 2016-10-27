<?php

class SessionDb{

public static $SesID;


function __construct(){
  self::self_const();
 }

static function self_const(){

    //ini_set('session.gc_maxlifetime', 1800); //session消去の時間/秒
    //ini_set('session.use_trans_sid',0); //URLにセッションIDを付加しない(デフォルト：0)
    //ini_set('session.use_cookies',1); //セッションIDの保存にcookieを使用する(デフォルト：1)
    //ini_set('session.use_only_cookies',1); //セッションIDの保存にcookieのみを使用(デフォルト：1)
    //ini_set('session.name', 'korehajibunde'); //一般的なセッション名を避ける場合
    //ini_set('session.cookie_secure',1); //HTTPS以外でのcookieを送信しない(デフォルト：0)
    ini_set('session.use_strict_mode',1); //セッションアダプション対策(デフォルト：0)
    session_start(); 
    session_regenerate_id(true);
    self::setSesID(session_id());
    $_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR']; 
}


static function setSesID($data){
  self::$SesID = $data;
}


static function ck_ses(){

    /*
    if(self::$SesID ==session_id()):
         if($_SESSION['ipaddress'] == $_SERVER['REMOTE_ADDR']){ return true; }
    endif;
    */
    
    return true;

}


static function exist_ck($key){
    if(@$_SESSION[$key]==""):
        return true;
    endif;
}

 static function set($key,$value){
    if(self::ck_ses()){
      $_SESSION[$key] = $value;
      //echo $value;
    }

  }

 static function get($key){

    if(self::ck_ses()){

      if(isset($_SESSION[$key])){
       return $_SESSION[$key];
      }

    }

  }


  static function del(){
    session_destroy();
    session_unset();
    //setcookie(session_name(), '', time() - 3600, "/");
  }

  static function find($keys,$find){
    if(self::ck_ses())
    $data = $_SESSION[$keys];

    foreach ($data as $key => $value) {
       if($find==$value) return true;
     }
  }

    function __destruct(){

    }

}
