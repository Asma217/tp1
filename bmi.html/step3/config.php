<?php
  $host = "localhost";
  $user ="admin";
  $password ="bmi2005";
  $db ="bmi_record";

  // إنشاء الاتصال
  
  $conn=    mysqli_connect( $host, $user, $password, $db); 
  // التحقق من الاتصال
  if ($conn->connect_error) {
      die("فشل الاتصال!".$conn->connect_error);
  }
  ?>