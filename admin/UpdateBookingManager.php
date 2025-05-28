<?php
 session_start();


 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
 
 header("location:http://localhost/php/Pag/index.php");
   }
// if(!isset($_SESSION['UserName'])){
//     header("location:http://localhost/php/Pag/Login.php");
// }
include("../Config/config.php");
?>
<?php
if(isset($_POST['Name'])){
   
    echo "<pre>";
    print_r($_POST);    
    echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
$Name=htmlspecialchars($_POST['Name']);
$Doctor=htmlspecialchars($_POST['Doctor']);
$Date=htmlspecialchars($_POST['Date']);
$Time=htmlspecialchars($_POST['Time']);
$Services=htmlspecialchars($_POST['Services']);
$Detail=htmlspecialchars($_POST['Detail']);
echo $Doctor;
$query="select  id as DoctorID from Doctors where name='$Doctor'";
$result=  mysqli_query($con,$query);
$Row=mysqli_fetch_assoc($result);

$DoctorID=$Row['DoctorID'];
$BookingID=$_POST['BookingID'];
echo $_SESSION['UserName'];
$query1="select ServicesID from Services where ServicesName='$Services'";
$result1=  mysqli_query($con,$query1);
$Row1=mysqli_fetch_assoc($result1);
$ServicesID=$Row1['ServicesID'];
 $NameUser=$_SESSION['UserName'];
$query22 ="select UserID from Users where UserName='$NameUser' ";
$result2 = mysqli_query($con,$query22);
$Row2=mysqli_fetch_assoc($result2);
$UserID=$Row2['UserID'];
// echo $UserID;
// echo $Time;
$query3="update  Booking set BookingName='$Name',BookingDate='$Date',BookingTime='$Time',BookingDetail='$Detail',DoctorID='$DoctorID',ServicesID='$ServicesID',UserID='$UserID' where BookingID='$BookingID' 
";
// echo $query3;
$result3=  mysqli_query($con,$query3);
// if(mysqli_num_rows($result3)>0){
    echo "تم الحجز بنجاح";
// }
header("location:http://localhost/php/admin/Booking.php");

}


?>