<?php
class BmiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($user_id, $name, $weight, $height) {
        $height=(float)$height;
        $weight=(float)$weight;
        // التحقق من المدخلات
            if (!is_numeric($weight) ||  !is_numeric($height) || $height <= 0 ||  $weight<= 0 ) {
            throw new Exception("القيم المدخلة غير صالحة!");
        }

        // حساب BMI
        $bmi = $weight / ($height * $height);
        $status = $this->getStatus($bmi);

        // حفظ النتيجة
        $this->model->saveBmiRecord($user_id, $name, $weight, $height, $bmi, $status);

        // إرجاع النتائج للعرض
        return [
            'bmi' => number_format($bmi, 2),
            'status' => $status
        ];
    }

    private function getStatus($bmi) {
        if ($bmi < 18.5) return "نقص الوزن";
        elseif ($bmi < 25) return "وزن طبيعي";
        elseif ($bmi < 30) return "زيادة وزن";
        else return "سمنة مفرطة";
    }
}
?>