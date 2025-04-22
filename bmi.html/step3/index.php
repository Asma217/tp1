<?php

header('Content-Type: application/json');
require_once(__DIR__"/config.php"); // استدعاء ملف الاتصال
if (isset($_POST['name'], $_POST['weight'], $_POST['height'])) {
if (isset($_POST['name'], $_POST['weight'], $_POST['height'])) {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($weight <= 0 || $height <= 0) {
        echo "قيم غير صالحة.";
        exit;
    }

    $bmi = $weight / ($height * $height);
    $interpretation = "";
   

    $result= "مرحبًا، $name. مؤشر كتلة جسمك هو " . number_format($bmi, 2) . " ($interpretation).";
    
     

}
 else {
    $result= "لم يتم استلام البيانات.";
}}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title> BMI Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body dir="rtl">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <form id="bmifrom" class="mt_3 bg_ligth p_4 rounded shadow">
            <div class="container">
                <h1>BMI Calculator</h1>
                <div id="result"></div>
                <form id="bmiform">
                    <div class="from-group">
                    <input type="text" class="row">
                    </div>
                    <div class="form-group">
                        <label for="name">الاسم:</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="weight">الوزن (kg):</label>
                        <input type="number" class="form-control" id="weight" required>
                    </div>
                    <div class="form-group">
                        <label for="height"> الطول(m):</label>
                        <input type="number" class="form-control" id="height" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </form>
                </body>   
                </html>