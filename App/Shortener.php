<?php
class Shortener{
  private $id;
  private $url;
  private $access;

  public function setId($Id){
    $this->id = $Id;
  }

  public function setUrl($Url){
    $this->url = $Url;
  }

  public function setAccess($Access){
    $this->access = $Access;
  }

  public function getId(){
    return $this->id;
  }

  public function getUrl(){
    return $this->url;
  }

  public function getAccess(){
    return $this->access;
  }
}
?>
