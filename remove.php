<?php
require_once("App/config.php");
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

if($id){
  //unlink(PATH ."/". $id.".db");
  $f = PATH."/{$id}.db";
  if(file_exists($f)){
    unlink($f);
    echo "<script>window.close();</script>";
  }
}
?>
