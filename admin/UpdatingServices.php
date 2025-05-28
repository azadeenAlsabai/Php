<?php
session_start();
 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){

 header("location:http://localhost/php/Pag/index.php");
   }
if(isset($_POST['ID'])){
    include("../config/config.php");
    $ServicesID=$_POST['ID'];
    $ServicesName=$_POST['Name'];
    $ServicesDetail=$_POST['Detail'];
   echo $ServicesID;
   echo $ServicesName;
   echo $ServicesDetail;
// $_FILES['Imge'];
   echo $_FILES["Imge"]["name"];
  
$ServerImge=$_FILES["Imge"]["name"]??$_POST['ImgeBefore'];
if(isset($_FILES["Imge"]["name"])&& $_FILES["Imge"]["name"]!=""){
    $Dir1="../Upload/".$_FILES["Imge"]["name"];
    if(move_uploaded_file($_FILES["Imge"]["tmp_name"],$Dir1)){
        $ServerImge="../Upload/".$ServerImge;

        // echo "تم النسخ بنجاح".$Dir1 ; 
    }
    
}else{
    $ServerImge=$_POST['ImgeBefore'];
}
 
  echo $ServerImge;

    $query="Update   Services  set ServicesName='$ServicesName' ,ServicesImge='$ServerImge',ServicesDetail='$ServicesDetail' where ServicesID='$ServicesID'";
$result=  mysqli_query($con,$query);

Header("location:http://localhost/php/admin/Services.php");









}



?>