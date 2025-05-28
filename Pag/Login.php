<?php
session_start();
if( isset( $_COOKIE['Cokie'])){
   
$data= explode('#//#',$_COOKIE['Cokie']);

    $_SESSION['UserName']=$data[0];
    $_SESSION['Password']=$data[1];
    $_SESSION['UserType']=$data[2];
   

Header("location:http://localhost/php/index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/Login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >

    <form class="Login"  method="Post" action="LoginManager.php">
<img src="../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg">
<h3>Login</h3>
<p id="Notification"></p>
<input type="text" placeholder="اسم المستخدم" class="Input" id="a1" name="UserName" onKeyUp="SearchUserName()">
<input type="password" placeholder="كلمة السر" class="Input" id="a2" name="Password">
<!-- <select name="Type" id="">
    <option value="1">عادي</option>
    <option value="2">مشرف</option>
</select> -->

<input type="submit" value="دخول" class="submit">
<a href="#" >
    <h4>تسجيل دخول جديد</h4>
</a>





    </form>
<script>
  document.getElementById("a1").addEventListener("keyup",function(e){
 if((this.value.length)>3){

let xhr=new xmlHttpRequest;
hhr.open('GET',"search.php?query=${encodeURLComponent(this.value)}",true);

xhr.onreadStateChange=function(){
if(xhr.readyState==4&&xhr.status==200){
      document.getElementById("Notification").innerHTML=xhr.responseText;
}


}
  xhr.send();
}


  });

</script>
</body>
</html>
