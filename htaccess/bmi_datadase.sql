CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL,
       role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
   );

   CREATE TABLE bmi_records (
       id INT AUTO_INCREMENT PRIMARY KEY,
       user_id INT NOT NULL,
       name VARCHAR(100) NOT NULL,
       weight FLOAT NOT NULL,
       height FLOAT NOT NULL,
       bmi FLOAT NOT NULL,
       status VARCHAR(50) NOT NULL,
       timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
   );