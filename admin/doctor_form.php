<?php
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الأطباء</title>
    <link rel="stylesheet" href="../css/DoMan.css">
    <?php include("../include/Header.php"); ?>
    <?php include("Sidebar.php"); ?>
    <style>
        .alert { padding: 15px; margin: 10px 0; border-radius: 4px; }
        .alert-success { background-color: #dff0d8; color: #3c763d; }
        .alert-error { background-color: #f2dede; color: #a94442; }
    </style>
</head>
<body style="margin-right:250px;margin-left:20px;margin-top:200px">
<div class="container">
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
    <?php endif; ?>
    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <h2>إدارة الأطباء</h2>
    <form method="POST" action="save_doctor.php" enctype="multipart/form-data">
        <div class="form-section">
            <div class="form-left">
                <label>الاسم:</label>
                <input type="text" name="name" required><br>
                
                <label>التخصص:</label>
                <input type="text" name="specialty" required><br>
                
                <label>الوصف:</label>
                <textarea name="description"></textarea><br>
                
                <label>المؤهلات العلمية:</label>
                <textarea name="education"></textarea><br>
                
                <label>الخبرة العملية:</label>
                <textarea name="experience"></textarea><br>
                
                <label>صورة:</label>
                <input type="file" name="image" accept="image/*"><br>
                
                <div class="buttons">
                    <input type="submit" value="إضافة" class="save">
                </div>
            </div>
        </div>
    </form>

    <hr>
    <h3>قائمة الأطباء</h3>
    <table>
        <tr>
            <th>الاسم</th>
            <th>التخصص</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>الإجراءات</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['specialty']) ?></td>
            <td><?= htmlspecialchars(substr($row['description'], 0, 50)) ?>...</td>
            <td>
                <?php if($row['Upload_path']): ?>
                    <img src="../<?= htmlspecialchars($row['Upload_path']) ?>" width="50">
                <?php endif; ?>
            </td>
            <td class="actions">
                <a href="edit_doctor.php?id=<?= $row['id'] ?>" class="btn edit">تعديل</a>
                <a href="delete_doctor.php?id=<?= $row['id'] ?>" class="btn delete" onclick="return confirm('هل أنت متأكد؟')">حذف</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>