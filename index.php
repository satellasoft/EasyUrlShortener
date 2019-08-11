<?php
$u = filter_input(INPUT_GET, "u", FILTER_SANITIZE_URL);
if($u){
  require_once("App/config.php");
  require_once("App/App.php");

  $r = (new App())->GetUrlById($u);
  if($r== "")
    echo "Invalid URL";
    else
    Header("Location: " . $r);
}
?>
