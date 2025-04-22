<?php
     require_once 'config.php';
     if ($conn->ping()) {
         echo "الاتصال ناجح!";
     } else {
         echo "فشل الاتصال: " . $conn->error;
     }
     $conn->close();
     ?>