<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'winnier');

if (!$connection) {
    die('فشل الاتصال بقاعدة البيانات: ' . mysqli_connect_error());
}