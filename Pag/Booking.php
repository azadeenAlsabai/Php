
<?php
session_start();
if(!isset($_SESSION['UserName'])){
    header("location:http://localhost/php/Pag/Login.php");
}
include("../Config/config.php");
$query="select ServicesName from Services ";
$result=  mysqli_query($con,$query);
$query1="select name from doctors ";
$result1=  mysqli_query($con,$query1);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/Booking.css">
          <link  rel="stylesheet" href="../css/bootstrap.min.css" >

 
    <
             <?php
       include("../include/Header.php");
    
    ?>
   
              <!-- <?php
       include("Sidebar.php");
    
    ?> -->
</head>
<body style="padding-top:100px" dir="rtl">
    <?php
       include("../include/Header.php");
    
    ?>
    
<section dir="ltr">
    <div class="Header">
    <img src="../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg" alt="">
    <p class="Title">اضافة موعد جديد</p>
<p></p>
    </div>
<form action="BookingManager.php" method="post" onsubmit="return ValidateImeges()" enctype="multipart/form-data" class="section">
    
<div class="Name">
<input type="text" name="Name">
<img src="../Picture/toothache.png" alt="">
<p>اسم المريض</p>

</div>
<div class="PriceProduct">
  <select name="Doctor" id="">
  <?php
                while($Row1=mysqli_fetch_assoc($result1)){
                ?>
    <option value="<?php echo $Row1['name']; ?>"><?php echo $Row1['name']; ?></option>
  <?php } ?>
  </select>
<img src="../Picture/medical.png" alt="">

    <p> الطبيب</p>
    </div>
    <div >
        <input  type="date" name ="Date">
<img src="../Picture/number-9.png" alt="">

        <p>التاريخ</p>
        </div>
        <div class="ِAddress">


            <input type="time" name="Time">
            <img src="../Picture/number-9.png" alt="">
            <p>  الوقت</p>
            </div>
            <div class="Count">
            <select name="Services" id="">
                <?php
                while($Row=mysqli_fetch_assoc($result)){
                ?>
    <option value="<?php echo $Row['ServicesName']; ?>"><?php echo $Row['ServicesName']; ?> </option>

   <?php } ?>
  </select>
<img src="../Picture/syringe.png" alt="">

                <p> الخدمة</p>
                </div>
                <div class="Counts">
                    <input type="text" name="Detail">
<img src="../Picture/checklist.png" alt="">

                    <p> ملاحضات</p>
                    </div>
                    <div class="Control">
    
<a href="http://localhost/php/Pag/index.php"><input class="cancel" value="الغاء" type="button">

                </input></a>
<button class="submet" type="submet" >
حجز الان
</button>

                    </div>

                
</form>


</section>

 <?php include("../include/Fotter.php");

?>
</body>
</html>