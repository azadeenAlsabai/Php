<?php
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM doctors WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل طبيب</title>
    <link rel="stylesheet" href="../css/DoMan.css">
    <?php include("../include/Header.php"); ?>
    <?php include("Sidebar.php"); ?>
</head>
<body style="margin-right:250px;margin-left:20px;margin-top:200px">
<div class="container">
    <h2>تعديل بيانات الطبيب</h2>
    <form method="POST" action="update_doctor.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        
        <div class="form-section">
            <div class="form-left">
                <label>الاسم:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>
                
                <label>التخصص:</label>
                <input type="text" name="specialty" value="<?= htmlspecialchars($row['specialty']) ?>" required><br>
                
                <label>الوصف:</label>
                <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea><br>
                
                <label>المؤهلات العلمية:</label>
                <textarea name="education"><?= htmlspecialchars($row['education']) ?></textarea><br>
                
                <label>الخبرة العملية:</label>
                <textarea name="experience"><?= htmlspecialchars($row['experience']) ?></textarea><br>
                
                <label>الصورة الحالية:</label>
                <?php if($row['Upload_path']): ?>
                    <img src="../<?= htmlspecialchars($row['Upload_path']) ?>" width="100" style="display:block; margin:10px 0;">
                    <input type="hidden" name="current_image" value="<?= $row['Upload_path'] ?>">
                <?php endif; ?>
                
                <label>تغيير الصورة:</label>
                <input type="file" name="image" accept="image/*"><br>
                
                <div class="buttons">
                    <input type="submit" class="save" value="تحديث">
                    <a href="doctor_form.php" class="cancel">إلغاء</a>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>