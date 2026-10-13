<?php
include './inc/conn.php';
include './inc/form.php';
include './inc/select.php';
?>

<?php include_once './parts/header.php'; ?>

<!-- ================== محتوى الصفحة يبدأ من هنا ================== -->

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center ">
  <div class="col-md-5 p-lg-5 mx-auto">
    <img src="images/mee.jpeg"
     alt="مرتجى إبراهيم"
     class="mb-3"
     width="250"
     height="250"
     style="object-fit: contain; background-color: white; border: 2px solid #ddd;">
    <h1 class="display-4 fw-normal">مسابقة مرتجى الكبرى</h1>
    <p class="lead fw-normal">الوقت المتبقي لبدء التسجيل:</p>
    <h3 id="countdown" class="fs-4 fw-bold text-dark"></h3>
    <p class="lead fw-normal">للدخول في سحب على نسخة مجانية من برنامجنا</p>
  </div>
  <div class="container">
    <h3>شروط الانضمام للسحب:</h3>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">متابعة البث المباشر على صفحة الفيسبوك في الموعد المحدد.</li>
      <li class="list-group-item">سيستمر البث لمدة ساعة ويتضمن فقرة أسئلة وأجوبة مفتوحة.</li>
      <li class="list-group-item">سيُتاح التسجيل خلال هذه الساعة، يرجى إدخال اسمك وبريدك الإلكتروني هنا.</li>
      <li class="list-group-item">في ختام البث، سيتم سحب اسم فائز واحد عشوائياً من المسجلين.</li>
      <li class="list-group-item">الفائز سيحصل على نسخة مجانية بالكامل من برنامجنا الجديد.</li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="position-relative text-center">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h3>سجل بياناتك هنا</h3>

        <div class="mb-3">
          <label for="firstName" class="form-label">الاسم الشخصي</label>
          <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $firstName ?>">
          <div class="form-text text-danger"><?php echo $errors['firstNameError'] ?></div>
        </div>

        <div class="mb-3">
          <label for="lastName" class="form-label">اسم العائلة</label>
          <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName ?>">
          <div class="form-text text-danger"><?php echo $errors['lastNameError'] ?></div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">الإيميل (البريد الإلكتروني)</label>
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>">
          <div class="form-text text-danger"><?php echo $errors['emailError'] ?></div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">تأكيد التسجيل</button>
      </form>
    </div>
  </div>

  <div class="loader-con">
    <div id="loader">
      <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
  </div>

  <!-- Button trigger modal -->
  <div class="d-grid gap-2 col-6 mx-auto my-5">
    <button type="button" id="winner" class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modal">
      سحب اسم الفائز
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">الفائز سعيد الحظ هو</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php foreach ($users as $user) : ?>
            <h1 class="display-3 text-center modal-title" id="modalLabel"> 
              <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
            </h1>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

<?php include_once './parts/footer.php'; ?>