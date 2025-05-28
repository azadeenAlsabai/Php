
<?php
session_start();
 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){

 header("location:http://localhost/php/Pag/index.php");
   }
include("../Config/config.php");


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
<body style=" background-image: url('../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg');margin-right:250px;margin-left:20px;margin-top:100px">
   
<section>
    <div class="Header" style="margin-left:100px">
  <img src="../Picture/353092f9-5d52-4c47-ba96-0e3fce0c4bce.jpeg" alt="">
    <p class="Title">اضافة  خدمة جديدة</p>
<p></p>
    </div>
<form action="AddingServices.php" method="post" onsubmit="return ValidateImeges()" enctype="multipart/form-data" class="section">
    
<div class="Name">
<input type="text" name="Name">

<p>اسم الخدمة</p>

</div>

    <div >
        <input  type="text" name ="Detail">


        <p>الوصف</p>
        </div>
        <div >
        <input  type="file" name ="Imge" style=" background-color: rgb(9, 173, 223);">


        <p>صورة الخدمة</p>
        </div>

        <div class="Control">
    
<button class="cancel">
الغاء
</button>
<button class="submet" type="submet" >
 اضافة
</button>

                    </div>

                
</form>


</section>


</body>
</html>