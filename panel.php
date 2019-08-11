<?php
session_start();

if(!isset($_SESSION["auth"])){
  header("Location: login.php?q=2");
}
require_once("App/config.php");
require_once("App/App.php");
$app = new App();

$txt = filter_input(INPUT_POST, "txtUrl", FILTER_SANITIZE_URL);
if($txt){
  if($app->Write($txt)){
    header("Location: panel.php");
  }
}

$listUrl = $app->ReadAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Easy URL Shortener</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/unsemantic-grid-responsive.css">
  <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
  <div class="max-width bg-white padding">
    <div>
      <div class="grid-80 mobile-grid-70">
        <h1>Easy URL Shortener</h1>
      </div>
      <div class="grid-20 mobile-grid-30" style="text-align: right;">
        <a class="link" href="panel.php">R</a><a class="link" href="logout.php">X</a>
      </div>
      <div style="clear:both;"></div>
    </div>
    <br>
    <div id="dvForm" onsubmit="return CreateURL();">
      <form method="post">
        <div class="grid-80 mobile-grid-100">
          <input class="input text full-width" type="text" name="txtUrl" id="txtUrl" placeholder="Your URL here">
        </div>
        <div class="grid-20 mobile-grid-100">
          <input class="input btn bold full-width" type="submit" name="btnCreate" value="Create">
        </div>
        <div class="clear"></div>
      </form>
      <p id="pResult">&nbsp;</p>
    </div>
    <br>
    <div id="dvTable" style="overflow-x:auto;" class="grid-100">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>ORIGINAL URL</th>
            <th style="min-width:150px;">NEW URL</th>
            <th>ACCESS</th>
            <th>REMOVE</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($listUrl != null){
            foreach ($listUrl as $l) {
              ?>
              <tr>
                <td><?=$l->getId();?></td>
                <td><a href="<?=$l->getUrl();?>" target="_blank"><?=$l->getUrl();?></a></td>
                <td>
                  <input class="input full-width cursor" type="text"
                  value="<?=SITEURL?><?=$l->getId();?>"
                  onclick="Copy(this);"/>
                </td>
                <td style="text-align: center; font-weight: bold; color: red;"><?=$l->getAccess();?></td>
                <td><input type="button" class="input btn-remove" value="REMOVE" onclick="Delete(this);" data-id="<?=$l->getId();?>"/></td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <br>
    <p><a href="https://www.satellasoft.com">SatellaSoft</a> - Easy URL Shortener 2019</p>
  </div>
  <script src="js/script.js"></script>
</body>
</html>
