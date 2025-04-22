<?php
header('Content-Type: application/json');
require_once 'config.php'; // استدعاء ملف الاتصال

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
    $stmt = $conn->prepare("INSERT INTO bmi_records (name, weight, height, bmi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddd", $name, $weight, $height, $bmi);
    $stmt->execute();
    $stmt->close();

    if ($bmi < 18.5) {
        $interpretation = "نقص الوزن";
    } elseif ($bmi < 25) {
        $interpretation = "وزن طبيعي";
    } elseif ($bmi < 30) {
        $interpretation = "زيادة وزن";
    } else {
        $interpretation = "سمنة";
    }

    echo "مرحبًا، $name. مؤشر كتلة جسمك هو " . number_format($bmi, 2) . " ($interpretation).";
} else {
    echo "لم يتم استلام البيانات.";
}
?>