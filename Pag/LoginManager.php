<?php
include("../Config/config.php");
if(isset($_POST['UserName'])){

$UserName=htmlspecialchars($_POST['UserName']);

$Password=htmlspecialchars($_POST['Password']);
// echo $UserName;
// echo $Password;
$query="select UserName,Password,UserType,FullName,Imge from Users where UserName='$UserName' ";
$resultCount=  mysqli_query($con,$query);
if(mysqli_num_rows($resultCount)>0){
    session_start();
    $Rows=mysqli_fetch_assoc($resultCount);
   

    $_SESSION['UserName']=$Rows['UserName'];
    $_SESSION['Password']=$Rows['Password'];
    $_SESSION['UserType']=$Rows['UserType'];
    $_SESSION['FullName']=$Rows['FullName'];
    $_SESSION['Imge']=$Rows['Imge'];
    setcookie( "Cokie", $_SESSION['UserName']."#//#". $_SESSION['Password'] ."#//#".$_SESSION['UserType'],time()+10000,"/");

    header("location:http://localhost/php/index.php");


}else{
echo "خطا في كلمه السر او اسم المستخدم ";
}

}

?>