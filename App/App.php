<?php
class App{

  function Write(){

  }

  function ReadAll(){

  }

  function ReadByUrl(string $url){

  }


  function GetRandomString(int $length){
    $a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $aLength = strlen($a);
    $str = "";
    
    for($i = 0; $i < $length; $i++){
      $str .= $a[rand(0, $aLength-1)];
    }

    return $str;
  }
}

?>
