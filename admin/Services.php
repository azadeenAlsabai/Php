


<?php
session_start();
  if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){

 header("location:http://localhost/php/Pag/index.php");
   }
include("../config/config.php");
$query="select ServicesID ,ServicesName,ServicesImge,ServicesDetail from Services";
$result=  mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/AdminBooking.css">
    
              <?php
       include("Sidebar.php");
    
    ?>
          <?php
       include("../include/Header.php");
    
    ?>
</head>
<body  style="margin-right:250px;margin-left:20px;margin-top:100px" dir="rtl">
   
    
    <header dir="ltr">
<div class="NameBooking">

<p>إدارة الخدمات</p>
<img src="../Picture/application.png" alt="">
</div>
<hr>

<div class="SearchAndFilter">

    

<!-- 
<select name="" id="">
    <option value="">جميع الاطباء</option>
    <option value=""></option>
    <option value=""></option>
 </select>
 <select name="" id="">
    <option value="">جميع الحالات</option>
    <option value=""></option>
    <option value=""></option>
 </select> -->
 <a href="http://localhost/php/Admin/AddServices.php"> <button >
    
    اضافة خدمة +
    </button></a>

 <div class="Mysearch">
 <img src="../Picture/search (4).png" alt="">
    <input placeholder="ابحث هنا   " type="search">


    </div>



</div>

    </header>

<section>
    <table>
        <tr>
            <td class="MyHeader">رقم الخدمة</td>
            <td class="MyHeader">  اسم الخدمة</td>
            <td class="MyHeader">  الصورة</td>
            <td class="MyHeader">  التفاصيل</td>
            <td class="MyHeader">  تعديل</td>
            <td class="MyHeader">  حذف</td>
          
   
      

        </tr>
  <?php while($Row=mysqli_fetch_assoc($result)){?>
<tr class="Myrow">
    
    <td><?php echo $Row['ServicesID'];?></td>
    <td><?php echo $Row['ServicesName'];?></td>
    <td><img src="<?php echo $Row['ServicesImge'];?>" alt="" class="ImgeInTableServices" width="80"     height="85" >  </td>
    <td> <?php echo $Row['ServicesDetail'];?></td>
 
  
    <td> <a href="UpdateServices.php?ID=<?php echo $Row['ServicesID'];?>&Name=<?php echo $Row['ServicesName'];?>&Imge=<?php echo $Row['ServicesImge'];?>&Detail=<?php echo $Row['ServicesDetail'];?>"><img class="imges" src="../Picture/edit.png" alt=""></a> </td>
    <td> <a href="DeleteServices.php?ServicesID=<?php echo $Row['ServicesID'];?>"><img  class="imges" src="../Picture/delete.png" alt="" ></a> </td>

</tr>
<?php } ?>

    </table>
</section>


</body>
</html>

