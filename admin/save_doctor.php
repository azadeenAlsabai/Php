<?php
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// معالجة رفع الصورة
$upload_path = "";
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "../upload/";
    if(!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $upload_path = "upload/" . $file_name;
    }
}

// إعداد الاستعلام
$stmt = $conn->prepare("INSERT INTO doctors (name, Upload_path, specialty, description, education, experience) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", 
    $_POST['name'],
    $upload_path,
    $_POST['specialty'],
    $_POST['description'],
    $_POST['education'],
    $_POST['experience']
);

if($stmt->execute()) {
    header("Location: doctor_form.php?success=تمت إضافة الطبيب بنجاح");
} else {
    header("Location: doctor_form.php?error=" . urlencode($stmt->error));
}

$stmt->close();
$conn->close();
?>