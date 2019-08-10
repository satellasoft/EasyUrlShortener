"use strict"

function CreateURL(){
  var txtUrl = document.getElementById("txtUrl").value;
  var pResult = document.getElementById("pResult");
  pResult.innerHTML = "";

  if(txtUrl.length <=3){
    pResult.innerHTML = "<span style='color: red;'>Invalid URL</span>";
    return false;
  }
}

function Delete(id){
  if(id == 0 || id == "")
  return;
  if(confirm("Do you really want to remove this URL?"))
  console.log(id);
}

function Login(){
  var txtUserKey = document.getElementById("txtUserKey").value;
  var pResult = document.getElementById("pResult");
  pResult.innerHTML = "";
  if(txtUserKey.length <=3){
    pResult.innerHTML = "<span style='color: red;'>Invalid User key</span>";
    return false;
  }
  else{
    return true;
  }

}
