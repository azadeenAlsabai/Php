



<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost:3307", "root", "", "php");
if ($conn->connect_error) die("فشل الاتصال: " . $conn->connect_error);

// جلب بيانات الأطباء
$result = $conn->query("SELECT id, name, Upload_path, specialty FROM doctors");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>أطباء ابتسامة النجوم</title>
  <link rel="stylesheet" href="../css/Doctor.css">
    <link  rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <?php
       include("../include/Header.php");
    
    ?>

</head>
<body style="padding-top:130px">

<h1 class="title">أطباء ابتسامة النجوم</h1>
  <div class="clinic-description">
    <p>
      تقدم عيادات أسنان <strong>دنتكس</strong> نخبة من أفضل أطباء الأسنان ذوي الخبرات العالمية لعلاج أسنانك باستخدام أحدث التقنيات المتطورة.<br><br>
      نحن ملتزمون بتقديم أفضل رعاية صحية للفم والأسنان لضمان ابتسامة صحية وجميلة، بما في ذلك:
      تنظيف الأسنان، جراحة الفك والفم والوجه، زراعة الأسنان، تركيبات الأسنان الثابتة والمتحركة، علاج أمراض اللثة، وعلاج جذور الأسنان (العصب).<br><br>
      كمان نضمن لك ابتسامة هوليود جميلة ومشرقة.<br><br>
      <strong>احجز موعدك الآن</strong> للاستفادة من هذه الخدمات المتقدمة وضمان صحة وجمال أسنانك.
    </p>
  </div>  
  <div class="container">
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="card">
    <img src="../<?= $row['Upload_path'] ?>" alt="<?= $row['name'] ?>">    
     <h3>د. <?= $row['name'] ?></h3>
        <a href="details.php?id=<?= $row['id'] ?>" class="btn">تفاصيل</a>
    </div>
    <?php endwhile; ?>
  </div>

</body>
<?php include("../include/Fotter.php");

?>
</html>
<?php $conn->close(); ?>




