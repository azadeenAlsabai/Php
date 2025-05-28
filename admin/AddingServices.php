<?php
session_start();
 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
    
 header("location:http://localhost/php/Pag/index.php");
   }
if(isset($_POST['Name'])){
    include("../config/config.php");
    $Dir1="../Upload/".$_FILES["Imge"]["name"];
    if(move_uploaded_file($_FILES["Imge"]["tmp_name"],$Dir1)){


        // echo "تم النسخ بنجاح".$Dir1 ; 
    }
    $Imge=$Dir1;
$ServicesName=htmlspecialchars( $_POST['Name']);
$ServicesDetail=htmlspecialchars( $_POST['Detail']);

$query="insert into Services (ServicesName,ServicesDetail,ServicesImge) values('$ServicesName','$ServicesDetail','$Imge') ";
$result=  mysqli_query($con,$query);
Header("location:http://localhost/php/admin/Services.php");

}

?>