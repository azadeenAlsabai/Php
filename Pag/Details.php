<?php

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("فشل الاتصال: " . $conn->connect_error);

// جلب بيانات الطبيب
$doctor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $conn->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل د. <?= $doctor['name'] ?? '' ?></title>
  <link rel="stylesheet" href="Details.css">
  <?php
       include("../include/Header.php");
    
    ?>
  <style>
  </style>
</head>
<body style="padding-top:100px">

  <?php if($doctor): ?>
  <div class="details-container">
  <div class="image-section">
    <?php
    $image_path = "../" . $doctor['Upload_path']; // تعديل المسار
    $default_image = "../imeg/default.jpg";
    ?>
    <img src="<?= file_exists($image_path) ? $image_path : $default_image ?>"
         alt="صورة د. <?= htmlspecialchars($doctor['name']) ?>"
         style="max-width:100%; height:auto;">
</div>
    <div class="info-section">
      <h1>د. <?= $doctor['name'] ?></h1>
      <h3><?= $doctor['specialty'] ?></h3>
      
      <div class="doctor-info">
        <h4>الوصف:</h4>
        <p><?= nl2br($doctor['description']) ?></p>
        
        <?php if(!empty($doctor['education'])): ?>
        <h4>المؤهلات العلمية:</h4>
        <p><?= nl2br($doctor['education']) ?></p>
        <?php endif; ?>
        
        <?php if(!empty($doctor['experience'])): ?>
        <h4>الخبرة العملية:</h4>
        <p><?= nl2br($doctor['experience']) ?></p>
        <?php endif; ?>
      </div>
      
      <a href="Doctor.php" class="back-btn">العودة إلى القائمة</a>
    </div>
  </div>
  <?php else: ?>
  <div style="text-align:center; padding:50px;">
    <h2>الطبيب غير موجود</h2>
    <a href="Doctor.php" class="back-btn">العودة إلى القائمة</a>
  </div>
  <?php endif; ?>

  <?php include("../include/Fotter.php");

?>
</body>
</html>
<?php $conn->close(); ?>