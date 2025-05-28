
<?php
session_start();
  if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){

 header("location:http://localhost/php/Pag/index.php");
   }
include("../config/config.php");
$ServicName=$_GET['ServicesName'];
$DocrorName=$_GET['DoctorName'] ;
$query="select ServicesName from Services  where  ServicesName <> '$ServicName'";
$result=  mysqli_query($con,$query);
$query1="select  name as DoctorName from Doctors where   name <> '$DocrorName'";
$result1=  mysqli_query($con,$query1);
// session_start();

// if(!isset($_SESSION['Name'])){
//     header("location:http://localhost/php/Pag/Login.php");
// }
if(isset($_GET['Name'])){
// echo $_GET['BookingDate'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/Booking.css">
    
        <?php
       include("../include/Header.php");
    
    ?>
   
              <?php
       include("Sidebar.php");
    
    ?>
</head>
<body style="margin-right:250px;margin-left:20px;margin-top:100px">
   
<section>

    <div class="Header">
    <img src="../Picture/edit.png" alt="">
    <p class="Title">تعديل موعد </p>
<p></p>
    </div>
<form action="UpdateBookingManager.php" method="post" onsubmit="return ValidateImeges()" enctype="multipart/form-data" class="section">
    
<div class="Name">
<input type="text" name="Name" value="<?php echo $_GET['Name'];?>">
<img src="../Picture/toothache.png" alt="">
<p>اسم المريض</p>
<input type="text" name="BookingID" value="<?php echo $_GET['BookingID'];?>" style="display:none" >
</div>
<div class="PriceProduct">
  <select name="Doctor" id="">
  <option value="<?php echo $_GET['DoctorName'];?>"><?php echo $_GET['DoctorName'];?></option>

  <?php
                while($Row1=mysqli_fetch_assoc($result1)){
                ?>
    <option value="<?php echo $Row1['DoctorName'];?>"><?php echo $Row1['DoctorName'];?></option>
    <?php } ?>
  </select>
<img src="../Picture/medical.png" alt="">

    <p> الطبيب</p>
    </div>
    <div >
        <input  type="date" name ="Date" value="<?php  echo date("Y-m-d", strtotime($_GET['BookingDate']));?>">
<img src="../Picture/number-9.png" alt="">

        <p>التاريخ</p>
        </div>
        <div class="ِAddress">


            <input type="time" name="Time" value="<?php echo $_GET['BookingTime'];?>">
            <img src="../Picture/number-9.png" alt="">
            <p>  الوقت</p>
            </div>
            <div class="Count">
            <select name="Services" id="">
    <option value="<?php echo $_GET['ServicesName'];?>"><?php echo $_GET['ServicesName'];?> </option>

            <?php
                while($Row=mysqli_fetch_assoc($result)){
                ?>
    <option value="<?php echo $Row['ServicesName'];?>"><?php echo $Row['ServicesName'];?> </option>
    <?php } ?>
 
  </select>
<img src="../Picture/syringe.png" alt="">

                <p> الخدمة</p>
                </div>
                <div class="Counts">
                    <input type="text" name="Detail" value="<?php echo $_GET['BookingDetail'];?>">
<img src="../Picture/checklist.png" alt="">

                    <p> ملاحضات</p>
                    </div>
                    <div class="Control">
    
<button class="cancel">
الغاء
</button>
<button class="submet" type="submet" >
 تعديل
</button>

                    </div>

                
</form>


</section>


</body>
</html>