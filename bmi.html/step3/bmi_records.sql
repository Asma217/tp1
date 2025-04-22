CREATE TABLE bmi_record (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    weight FLOAT,
    height FLOAT,
    bmi FLOAT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);