<?php 
session_start();

include("Config/config.php");


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيادة سما لطب الأسنان | الرعاية الشاملة لأسنانك</title>
 
    <link rel="stylesheet" href="css/index.css">
 

   <?php
 

   if(isset($_SESSION['UserType'])&& $_SESSION['UserType']=='1'){
    // echo  $_SESSION['UserType'];
    include ("admin/Sidebar.php");
   }
    ?>
</head>
<body style=" <?php
  if(isset($_SESSION['UserType'])&& $_SESSION['UserType']=='1'):?>
  <?php echo  'padding-right:230px; '?>
  <?php endif;?>
  
">
       <?php
    include("include/HeaderIndex.php");
    
    ?>
    <!-- بانر الهيرو -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content animate-on-scroll">
                    <h1 class="hero-title">ابتسامة صحية تبدأ معنا في عيادة سما</h1>
                    <p class="hero-subtitle">نقدم لك في عيادة سما لطب الأسنان أحدث التقنيات وعلاجات الأسنان بأعلى معايير الجودة والرعاية، لضمان ابتسامة مشرقة وصحية لك ولعائلتك.</p>
                    <div class="hero-btns">
                        <a href="http://localhost/php/Pag/Booking.php" class="btn btn-primary">
                            <i class="fas fa-calendar-check me-2"></i>حجز موعد
                        </a>
                        <a href="http://localhost/php/Pag/Services.php" class="btn btn-outline-light">
                            <i class="fas fa-search me-2"></i>استكشف الخدمات
                        </a>
                    </div>
                    <div class="hero-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span>أطباء متخصصون بخبرات عالمية</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span>أحدث التقنيات والمعدات الطبية</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span>بيئة معقمة وآمنة تماماً</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block animate-on-scroll">
                    
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الخدمات -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title animate-on-scroll">خدماتنا الطبية</h2>
                <p class="section-subtitle animate-on-scroll">نقدم مجموعة متكاملة من خدمات طب الأسنان بأحدث التقنيات والمواد العالمية</p>
            </div>
            <div class="row">
                 <?php  $services_query = $con->query("SELECT * FROM services");
                       while ($service=$services_query->fetch_assoc()):  
                ?>
                <div class="col-lg-4 col-md-6 animate-on-scroll">
                    <div class="service-card">
                      
                        <img src="<?php  echo substr($service['ServicesImge'] ,3,strlen( $service['ServicesImge']))?>" 
                             alt="<?php  echo $service['ServicesName'] ?> " 
                             class="img-fluid service-img">
                        <div class="service-icon">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="service-body">
                            <h3 class="service-title">علاج الأسنان</h3>
                            <p class="service-text"> <?php  echo $service['ServicesDetail'] ?> </p>
                            <a href="http://localhost/php/Pag/Services.php" class="read-more">
                                المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                 <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- قسم أعمالنا -->
    <section id="work" class="our-work-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title animate-on-scroll">أعمالنا السابقة</h2>
                <p class="section-subtitle animate-on-scroll">بعض النماذج من أعمالنا في علاج وتجميل الأسنان</p>
            </div>
            <div class="work-gallery">
                <?php  $work_out_query = $con->query("SELECT * FROM our_work");
                       while ($work_out=$work_out_query->fetch_assoc()):  
                ?>
                <div class="work-item animate-on-scroll">
                    <img src= "<?php echo $work_out['image']; ?>"
                         alt="<?php echo $work_out['title']; ?>" 
                         class="work-img">
                    <div class="work-overlay">
                        <h2 class="work-title"><?php echo $work_out['title'] ?></h2>
                        <p class="work-description"><?php  echo $work_out['description'] ?></p>
                    </div>
                </div>
                 <?php endwhile; ?>
            </div>
        </div>
    </section>
  
<!-- قسم الأطباء -->
<section id="doctors" class="doctors-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title animate-on-scroll">أطباؤنا المتخصصون</h2>
            <p class="section-subtitle animate-on-scroll">فريق من أفضل أطباء الأسنان المتخصصين في مختلف المجالات</p>
        </div>
        <div class="row">
            <?php
            $doctors_query = $con->query("SELECT * FROM Doctors");
            while ($doctor = $doctors_query->fetch_assoc()):
            ?>
            <div class="col-lg-3 col-md-6 animate-on-scroll">
                <div class="doctor-card">
                    <img src="<?php echo ''.$doctor['Upload_path']; ?>" 
                 
                         alt="<?php echo $doctor['name']; ?>" 
                         class="doctor-img">
                    <div class="doctor-body">
                        <h3 class="doctor-name"><?php echo $doctor['name']; ?></h3>
                        <p class="doctor-specialty"><?php echo $doctor['specialty']; ?></p>
                         <p class="Doctor-Detail"><?php  echo $doctor['education'] ; ?> </p>   
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
    <!-- الفوتر -->
  <?php include("include/Fotter.php");

?>

    <!-- زر العودة للأعلى -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="JS/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script>
        // تنفيذ التأثيرات عند التمرير
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.classList.add('animated');
                }
            });
        }

        // تنفيذ التأثيرات عند التحميل
        window.addEventListener('load', () => {
            animateOnScroll();
        });

        // تنفيذ التأثيرات عند التمرير
        window.addEventListener('scroll', () => {
            animateOnScroll();
            
            // إظهار/إخفاء زر العودة للأعلى
            if (window.pageYOffset > 300) {
                document.querySelector('.back-to-top').classList.add('active');
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.back-to-top').classList.remove('active');
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });

        // عداد الأرقام
        $(document).ready(function(){
            $('.stat-number').counterUp({
                delay: 10,
                time: 2000
            });
        });

        // إضافة تأثير النبض لزر حجز الموعد
        setInterval(() => {
            document.querySelector('.appointment-btn').classList.toggle('pulse-animation');
        }, 4000);
    </script>
</body>
</html>
