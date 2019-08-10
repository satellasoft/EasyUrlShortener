<?php
session_start();
if(isset($_SESSION["auth"])){
  header("Location: panel.php");
}

require_once("App/config.php");
$result = "";
$txtUserKey = filter_input(INPUT_POST, "txtUserKey", FILTER_SANITIZE_STRING);
if($txtUserKey){
  if($txtUserKey == USERKEY){
    $_SESSION["auth"] = true;
    header("Location: panel.php");
  }else{
    $result = "Invalid user key";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login - Easy URL Shortener</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
  <div class="max-width bg-white padding">
    <h1>Easy URL Shortener</h1>
    <br>
    <form method="post" onsubmit="return Login();">
      <label>User key <input class="input" type="text" name="txtUserKey" id="txtUserKey" placeholder="Put your key here"> </label>
      <button type="submit" class="input" name="button">Login</button>
    </form>
    <p id="pResult"><?=$result;?>&nbsp;</p>
    <br>
    <p><a href="https://www.satellasoft.com">SatellaSoft</a> - Easy URL Shortener 2019</p>
  </div>
  <script src="js/script.js"></script>
</body>
</html>
