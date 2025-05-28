
<?php
session_start();
 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
   
 header("location:http://localhost/php/Pag/index.php");
   }
include("../config/config.php");
$query="select b.BookingID as BookingID,d.Upload_path as DoctorImge,b.BookingName as FullName,s.ServicesName as ServicesName,b.BookingDate as BookingDate,b.BookingTime as BookingTime,d.name as DoctorName,b.BookingState as BookingState,b.BookingDetail as BookingDetail from Booking b join Users u on(b.UserID=u.UserID) join Services s on(b.ServicesID=s.ServicesID) join Doctors d  on(b.DoctorID=d.id)  order by b.BookingID";
$result=  mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="../Css/AdminBooking.css">

        <?php
       include("../include/Header.php");
    
    ?>
   
              <?php
       include("Sidebar.php");
    
    ?>
</head>
<body style="margin-right:250px;margin-left:20px;margin-top:100px" dir="rtl">

   
   
    <header dir="ltr">
      
   
<div class="NameBooking">
   
<p>إدارة الحجوزات</p>
<img src="../Picture/number-9.png" alt="">
</div>
<hr>

<div class="SearchAndFilter">

    


<select name="" id="">
    <option value="">جميع الاطباء</option>
    <option value=""></option>
    <option value=""></option>
 </select>
 <select name="" id="">
    <option value="">جميع الحالات</option>
    <option value=""></option>
    <option value=""></option>
 </select>
 <a href="http://localhost/php/Pag/Booking.php"> <button >
    
    اضافة حجز +
    </button></a>

 <div class="Mysearch">
 <img src="../Picture/search (4).png" alt="">
    <input placeholder="ابحث هنا   " type="search">


    </div>



</div>

    </header>
 
<section >
   
    <table>
        <tr>
            <td class="MyHeader">رقم الحجز</td>
            <td class="MyHeader"> اسم المريض</td>
            <td class="MyHeader">  الخدمة</td>
            <td class="MyHeader">  التاريخ</td>
            <td class="MyHeader">  الوقت</td>
            <td class="MyHeader">  الطبيب</td>
            <td class="MyHeader">  صورة الطبيب</td>
            <td class="MyHeader">  الحالة</td>
            <td class="MyHeader">  تعديل</td>
            <td class="MyHeader">  حذف</td>
   
      

</tr>
  <?php while($Row=mysqli_fetch_assoc($result)):?>
<tr class="Myrow">
    <!-- <td class="None"></td> -->
    <td><?php echo $Row['BookingID'];?></td>
    <td><?php echo $Row['FullName'];?></td>
    <td> <?php echo $Row['ServicesName'];?></td>
    <td> <?php echo $Row['BookingDate'];?></td>
    <td> <?php echo $Row['BookingTime'];?></td>
    <td> <?php echo $Row['DoctorName'];?></td>
    <td> <img src="../<?php echo $Row['DoctorImge'];?>" alt="" class="DoctorImge"> </td>
    <td> <?php 
    if($Row['BookingState']=='0'){
        echo "قيد التاكيد";
    }else{
        echo " تم تاكيده";

    }
    
    ?>
   </td>
    <td> <a href="UpdateBooking.php?Name=<?php echo $Row['FullName'];?>&BookingID=<?php echo $Row['BookingID'];?>&DoctorName=<?php echo $Row['DoctorName'];?>&BookingDate=<?php echo $Row['BookingDate'];?>&BookingTime=<?php echo $Row['BookingTime'];?>&ServicesName=<?php echo $Row['ServicesName'];?>&BookingDetail=<?php echo $Row['BookingDetail'];?>"><img class="imges" src="../Picture/edit.png" alt=""></a> </td>
    <td> <a href="DeleteBooking.php?BookingId=<?php echo $Row['BookingID'];?>"><img  class="imges" src="../Picture/delete.png" alt="" ></a> </td>
</tr>
<?php endwhile; ?>

    </table>
</section>


<script >

  function  AddBooking(){

    }
</script>
</body>
</html>

