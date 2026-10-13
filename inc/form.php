<?php

$firstName = $_POST['firstName'] ?? '';
$lastName  = $_POST['lastName']  ?? '';
$email     = $_POST['email']     ?? '';

$errors = [
    'firstNameError' => '',
    'lastNameError'  => '',
    'emailError'     => '',
];

if (isset($_POST['submit'])) {

    // التحقق من الاسم الأول
    if (empty(trim($firstName))) {
        $errors['firstNameError'] = 'الرجاء كتابة الاسم الأول';
    }

    // التحقق من اسم العائلة
    if (empty(trim($lastName))) {
        $errors['lastNameError'] = 'الرجاء كتابة الاسم الأخير';
    }

    // التحقق من البريد الإلكتروني
    if (empty(trim($email))) {
        $errors['emailError'] = 'الرجاء كتابة البريد الإلكتروني';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'صيغة البريد الإلكتروني غير صحيحة';
    }

    // التأكد من عدم وجود أخطاء في البيانات
    if (!array_filter($errors)) {
        $firstNameEsc = mysqli_real_escape_string($connection, $firstName);
        $lastNameEsc  = mysqli_real_escape_string($connection, $lastName);
        $emailEsc     = mysqli_real_escape_string($connection, $email);

        $sql = "INSERT INTO users (firstName, lastName, email) 
                VALUES ('$firstNameEsc', '$lastNameEsc', '$emailEsc')";

        if (mysqli_query($connection, $sql)) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo 'حدث خطأ أثناء حفظ البيانات: ' . mysqli_error($connection);
        }
    }
}