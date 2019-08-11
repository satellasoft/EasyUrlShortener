<?php
require_once("Shortener.php");

class App{

  public function __construct(){
    if(!is_dir(PATH)){
      mkdir(PATH);
    }
  }

  function Write(string $url){
    $shortener = new Shortener();
    $shortener->setId($this->GetUniqueId());
    $shortener->setUrl($url);
    $shortener->setAccess(0);

    $objData = serialize($shortener);

    $fp = fopen(PATH ."/".$shortener->getId(). ".db", "w");
    fwrite($fp, $objData);
    fclose($fp);

    return true;
  }

  function GetUniqueId(){
    $allFiles= $this->ReadAll();
    $valid = false;
    $uniqueId = $this->GetRandomString(URLLENGTH);

    if($allFiles != null){
      while(!$valid){
        $v = true;

        for ($i=0; $i < count($allFiles); $i++) {
          if(substr($allFiles[$i], 0, -3) == $uniqueId){
            $v = false;
          }
        }

        if(!$v){
          $uniqueId = $this->GetRandomString(URLLENGTH);
        }else{
          $valid = true;
        }
      }
    }

    return $uniqueId;
  }

  function ReadAll(){
    $files = $this->GetAllFiles();
    if(count($files)<=0)
    return;

    $listUrl = [];
    foreach($files as $f){
      $fullFile = PATH ."/".$f;
      if(file_exists($fullFile)){
        $objData = file_get_contents($fullFile);
        $listUrl[] = unserialize($objData);
      }
    }

    return $listUrl;
  }

  function GetAllFiles(){
    if(!is_dir(PATH))
    return;
    $var = scandir(PATH);
    $var = array_diff($var, array(".", ".."));
    return $var;
  }

  function GetUrlById(string $id){
    $f = PATH . "/{$id}.db";
    if(file_exists($f)){

      //READ FILE
      $objData = file_get_contents($f);
      $short = unserialize($objData);
      $short->setAccess($short->getAccess() + 1);

      //WRITEFILE
      $newObj = serialize($short);

      $fp = fopen($f, "w");
      fwrite($fp, $newObj);
      fclose($fp);
      return $short->getUrl();
    }else{
      return "";
    }
  }

  function Debug($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
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
