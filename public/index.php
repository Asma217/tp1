<?php
require DIR . '/../config/database.php';
require DIR . '/../app/models/BmiModel.php';
require DIR . '/../app/controllers/BmiController.php';

// افتراضيًا (للتجربة بدون تسجيل دخول)
$user_id = 1; 

$model = new BmiModel($db);
$controller = new BmiController($model);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $result = $controller->calculateBmi(
            $user_id,
            $_POST['name'],
            $_POST['weight'],
            $_POST['height']
        );
        extract($result);
        require '../app/views/bmi_result.php';
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
    }
} else {
    require '../app/views/bmi_form.php';
}
?>