<?php
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// معالجة رفع الصورة
$upload_path = $_POST['current_image'] ?? '';
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "../Upload/";
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;
    
    // حذف الصورة القديمة إذا وجدت
    if(!empty($_POST['current_image']) && file_exists("../".$_POST['current_image'])) {
        unlink("../".$_POST['current_image']);
    }
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $upload_path = "Upload/" . $file_name;
    }
}

// إعداد الاستعلام
if(!empty($upload_path)) {
    $stmt = $conn->prepare("UPDATE doctors SET 
        name=?, Upload_path=?, specialty=?, description=?, education=?, experience=? 
        WHERE id=?");
    $stmt->bind_param("ssssssi", 
        $_POST['name'],
        $upload_path,
        $_POST['specialty'],
        $_POST['description'],
        $_POST['education'],
        $_POST['experience'],
        $_POST['id']
    );
} else {
    $stmt = $conn->prepare("UPDATE doctors SET 
        name=?, specialty=?, description=?, education=?, experience=? 
        WHERE id=?");
    $stmt->bind_param("sssssi", 
        $_POST['name'],
        $_POST['specialty'],
        $_POST['description'],
        $_POST['education'],
        $_POST['experience'],
        $_POST['id']
    );
}

if($stmt->execute()) {
    header("Location: doctor_form.php?success=تم تحديث بيانات الطبيب بنجاح");
} else {
    header("Location: doctor_form.php?error=" . urlencode($stmt->error));
}

$stmt->close();
$conn->close();
?>