<?php
class BmiModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function saveBmiRecord($user_id, $name, $weight, $height, $bmi, $status) {
        $stmt = $this->db->prepare("
            INSERT INTO bmi_records 
            (user_id, name, weight, height, bmi, status) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$user_id, $name, $weight, $height, $bmi, $status]);
    }

    public function getBmiHistory($user_id) {
        $stmt = $this->db->prepare("
            SELECT * FROM bmi_records 
            WHERE user_id = ? 
            ORDER BY timestamp DESC
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
}
?>