<?php
session_start();

if(!isset($_SESSION["auth"])){
  header("Location: login.php?q=2");
}
require_once("App/config.php");
require_once("App/App.php");
$app = new App();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Easy URL Shortener</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
  <div class="max-width bg-white padding">
    <div>
      <div style="float: left; width: 500px;">
        <h1>Easy URL Shortener</h1>
      </div>
      <div style="float: right; text-align: right; width:50px;">
        <a href="logout.php">X</a>
      </div>
      <div style="clear:both;"></div>
    </div>
    <br>
    <div id="dvForm" onsubmit="return CreateURL();">
      <form method="post">
        <input class="input text" type="text" name="txtUrl" id="txtUrl" placeholder="Your URL here">
        <input class="input btn bold" type="submit" name="btnCreate" value="Create">
      </form>
      <p id="pResult">&nbsp;</p>
    </div>
    <br>
    <div id="dvTable">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>ORINAL URL</th>
            <th>NEW URL</th>
            <th>ACCESS</th>
            <th>REMOVE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>16516506</td>
            <td>satellasoft.com/</td>
            <td>satellasoft.com/156181</td>
            <td>55</td>
            <td><input type="button" class="input btn-remove" value="REMOVE" onclick="Delete(32);"/></td>
          </tr>
        </tbody>
      </table>
    </div>

    <br>
    <p><a href="https://www.satellasoft.com">SatellaSoft</a> - Easy URL Shortener 2019</p>
  </div>
  <script src="js/script.js"></script>
</body>
</html>
