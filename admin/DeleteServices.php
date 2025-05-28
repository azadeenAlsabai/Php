<?php
session_start();
 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){

 header("location:http://localhost/php/Pag/index.php");
   }
if(isset($_GET['ServicesID'])){
    include("../config/config.php");
    $ServicesID=$_GET['ServicesID'];

$query="Delete  from Services where ServicesID='$ServicesID'";
$result=  mysqli_query($con,$query);

Header("location:http://localhost/php/admin/Services.php");



}


?>