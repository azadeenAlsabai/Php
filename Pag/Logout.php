<?php
session_start();
 setcookie( "Cokie","",time()-1000,"/");
$_SESSION=array();
header("location:http://localhost/php/index.php");

?>