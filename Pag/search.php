<?php

isset($_GET['query']){
include("../config/config.php");
$UserName=htmlspecialchars($_GET['query']);
$query="select UserName from Users where UserName =$UserName";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result) >0){
    echo mysqli_num_rows($result);
  echo  xmlrpc_encode_request("اسم المستخدم صحيح");

}else{
 echo   xmlrpc_encode_request("اسم المستخدم غير صحيح");
}



}

?>

