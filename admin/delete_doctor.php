<?php
session_start();
 if((isset($_SESSION)&& $_SESSION['UserType']=='0')||!isset($_SESSION)){
    // echo  $_SESSION['UserType'];
 header("location:http://localhost/php/Pag/index.php");
   }
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);

// جلب بيانات الطبيب لحذف الصورة
$result = $conn->query("SELECT Upload_path FROM doctors WHERE id=$id");
$row = $result->fetch_assoc();

// حذف الصورة إذا وجدت
if($row && $row['Upload_path'] && file_exists("../".$row['Upload_path'])) {
    unlink("../".$row['Upload_path']);
}

// حذف الطبيب من قاعدة البيانات
if($conn->query("DELETE FROM doctors WHERE id=$id")) {
    header("Location: doctor_form.php?success=تم حذف الطبيب بنجاح");
} else {
    header("Location: doctor_form.php?error=" . urlencode($conn->error));
}

$conn->close();
?>