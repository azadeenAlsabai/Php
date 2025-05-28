<?php
session_start();
  if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
  
 header("location:http://localhost/php/Pag/index.php");
   }
if(isset($_GET['BookingId'])){

    include("../config/config.php");
    $Id=$_GET['BookingId'];
    $query="delete from Booking where BookingID='$Id'";
    $result=  mysqli_query($con,$query);
Header("location:http://localhost/php/admin/Booking.php");

}

?>

