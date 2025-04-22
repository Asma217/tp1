<?php
$result = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($weight > 0 && $height > 0) {
        $bmi = $weight / ($height * $height);
        // ... (نفس منطق التفسير)
        $interpretation = "";
        $result= "مرحبًا، $name. مؤشر كتلة جسمك هو " . number_format($bmi, 2) . " ($interpretation).";
    } else {
        $result = "قيم غير صالحة.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حاسبة BMI</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>حاسبة مؤشر كتلة الجسم (BMI)</h1>
    <?php if (!empty($result)) { echo "<p>$result</p>"; } ?>
    <form method="post" onsubmit="return validateForm();">
    <form action="calculate.php" method="post" onsubmit="return validateForm();">
        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="weight">الوزن (كجم):</label>
        <input type="number" id="weight" name="weight" required><br>
        <label for="height">الطول (م):</label>
        <input type="number" id="height" name="height" step="0.01" required><br>
        <input type="submit" value="احسب">
    </form>  
    </form>
</body>
</html>