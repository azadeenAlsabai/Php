
<?php
session_start();

  if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
    echo  $_SESSION['UserType'];
 header("location:http://localhost/php/Pag/index.php");
   }
   include("../Config/config.php");


if(isset($_GET['Name'])){
$ServicesID=$_GET['ID'];
$ServicesName=$_GET['Name'];
$ServicesDetail=$_GET['Detail'];
$ServicesImge=$_GET['Imge'];


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
<body style=" background-image: url('../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg'); margin-right:250px;margin-left:20px;margin-top:100px">
   
<section>
    <div class="Header" style="margin-left:100px">
  <img src="../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg" alt="">
    <p class="Title">  تعديل الخدمة </p>
<p></p>
    </div>
<form action="UpdatingServices.php" method="post" onsubmit="return ValidateImeges()" enctype="multipart/form-data" class="section">
    
<div class="Name">
<input type="text" name="Name" value="<?php echo $ServicesName;?>">

<p>اسم الخدمة</p>
<input type="text" name="ID" value="<?php echo $ServicesID;?>" style="display:none">

</div>

    <div >
        <input  type="text" name ="Detail" value="<?php echo $ServicesDetail;?>">


        <p>الوصف</p>
        </div>
        <div >
     
        <input  type="file" name ="Imge" style=" background-color: rgb(9, 173, 223);" value="<?php echo $ServicesImge;?>">


        <p>صورة الخدمة</p>
       
        </div>
        <div>
        
        <img src="<?php echo $ServicesImge;?>" alt="" width="80"  height="80" name="" >
        <input type="text" name="ImgeBefore" value="<?php echo $ServicesImge;?>" style="display:none">
        <p>الصورة الحالية</p>
        </div>

        <div class="Control">
 <a href="http://localhost/php/admin/Services.php"><button class="cancel">
الغاء
</button></a>   

<button class="submet" type="submet" >
 تعديل
</button>

                    </div>

                
</form>


</section>


</body>
</html>