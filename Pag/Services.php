<?php
session_start();
       include("../config/config.php");
$query="select ServicesName ,ServicesImge from Services";
  $result=  mysqli_query($con,$query);

?>
     

<!DOCTYPE html>
<html lang="en">
<head >
  
    <link rel="stylesheet" href="../Css\Services.css">

   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body style="margin-top:80px" dir="rtl">
         <?php
          
       include("../include/Header.php");
    
    ?>
    <section>
      
        <div class="Detail">
            <p class="Title">  تعرف علئ خدمات عيادتي
        </p>
        </div>
        <div class="Services">
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>

<div class="cart">
    <img src="<?php echo  $row['ServicesImge'];?>" alt="">
   
    <p><?php echo  $row['ServicesName'];?> </p>
</div>


<?php
            }
        ?>
        </div>
      
    </section>
 <?php include("../include/Fotter.php");

?>

</body>
</html>