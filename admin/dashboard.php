<?php
session_start();


 if((isset($_SESSION['UserType'])&& $_SESSION['UserType']=='0')|| !isset($_SESSION['UserType'])){
   
 header("location:http://localhost/php/Pag/index.php");
   }
   
include("../config/config.php");
// استرجاع عدد المرضى
$result = $con->query("SELECT COUNT(*) as count FROM users");
$row = $result->fetch_assoc();
$num_patients = $row['count'];
// استرجاع عدد المواعيد
$result = $con->query("SELECT COUNT(*) as count FROM booking");
$row = $result->fetch_assoc();
$num_booking = $row['count'];
//عدد الخدمات 

 $result = $con->query("SELECT COUNT(*) as count FROM 	services");
$row = $result->fetch_assoc();
$num_services = $row['count'];

// استرجاع عدد الأطباء
$result = $con->query("SELECT COUNT(*) as count FROM doctors");
$row = $result->fetch_assoc();
$num_doctors = $row['count'];
// استرجاع المواعيد القادمة
$appointments = $con->query("SELECT a.BookingTime as BookingTime, a.BookingDate as BookingDate, a.BookingName as UserName,
 d.name as name,s.ServicesName as ServicesName
FROM booking a
JOIN users u ON a.UserID= u.UserID 
JOIN doctors d ON a.DoctorID = d.id 
JOIN services s ON a.ServicesID = s.ServicesID 
ORDER BY a.BookingDate, a.BookingTime");



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة عيادة الأسنان</title>

</head>
 
<body style="padding-top:100px; padding-right:100px">
   <?php
    include ("Sidebar.php");
    ?>
    
        <?php
       include("../include/Header.php");
    
    ?>
    <div class="body" style="padding-right:200px;">
    <div class="container-fluid p-0" >
        <div class="row g-0">
           <!-- <?php include '../include/Header.php';  ?> -->
            <!-- المحتوى الرئيسي -->
            <div class="col-md-9 col-lg-10">
               <!-- الشريط العلوي -->
                <!-- <?php include '../incloude/herder.php'; ?> -->
               
                <div class="p-4">
                    <!-- بطاقات الإحصائيات -->
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card patients h-100 p-3">
                                <h6 class="text-muted">عدد المرضى</h6>
                                <h3 class="text-primary"><?php echo $num_patients; ?></h3>
                                <i class="fas fa-procedures stat-icon text-primary"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card appointments h-100 p-3">
                                <h6 class="text-muted">الحجوزات</h6>
                                <h3 class="text-success"><?php echo $num_booking; ?></h3>
                                <i class="fas fa-calendar-check stat-icon text-success"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card services h-100 p-3">
                                <h6 class="text-muted">الخدمات</h6>
                                <h3 class="text-warning"><?php echo $num_services; ?></h3>
                                <i class="fas fa-teeth-open stat-icon text-warning"></i></div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card doctors h-100 p-3">
                                <h6 class="text-muted">الأطباء</h6>
                                <h3 class="text-danger"><?php echo $num_doctors; ?></h3>
                                <i class="fas fa-user-md stat-icon text-danger"></i>
                            </div>
                        </div>
                    </div>
                    <!-- جدول المواعيد -->
                    <div class="appointment-table p-3 mb-4">
                        <h5 class="mb-3">المواعيد القادمة</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>الطبيب</th>
                                        <th>الخدمة</th>
                                        <th>اسم المريض</th>
                                        <th>الوقت</th>
                                        <th>التاريخ</th>
                                        <!-- <th>العمر</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php if ($appointments->num_rows > 0): ?>
                                        <?php while ($row = $appointments->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['name']) ?></td>
                                                <td><?= htmlspecialchars($row['ServicesName']) ?></td>
                                                <td><?= htmlspecialchars($row['UserName']) ?></td>
                                                <td><?= htmlspecialchars($row['BookingDate']) ?></td>
                                                <td><?= htmlspecialchars($row['BookingTime']) ?></td>
                                                <!-- <td><?= htmlspecialchars($row['patient_age']) ?></td> -->
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">لا توجد مواعيد قادمة</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- أزرار التحكم -->
                    <div class="d-flex gap-3 mb-4">
                                <a href="http://localhost/php/Pag/Booking.php" style="text-decoration: none;"> <button class="btn btn-primary">
                  <i class="fas fa-plus me-2"></i>حجز موعد
                        </button></a> 
                        <button class="btn btn-outline-secondary">
                            عدد المواعيد: <span class="badge bg-primary ms-2"><?php echo $num_booking; ?></span>
                        </button>
                    </div>
                                    <!-- عنوان حالة الأطباء -->
                    <h2 class="text-center mb-4">حالة الأطباء</h2>
                    <!-- حالات الأطباء -->
                    <div class="row g-3">
                        <?php
                        // استرجاع حالات الأطباء
                        $doctors_status = $con->query("SELECT * FROM doctors");
                        while ($doctor = $doctors_status->fetch_assoc()): ?>
                        <div class="col-12 col-md-4">
                            <div class="doctor-status-card p-3 status-<?php echo strtolower($doctor['name']); ?>">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-user-md fa-2x text-<?php echo strtolower($doctor['name']); ?>"></i>
                                    <div>
                                        <h6 class="mb-1"><?php echo $doctor['name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!--إغلاق الاتصال -->
   <?php  $con->close();?>
    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = darkModeToggle.querySelector('i');
            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });
    </script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>