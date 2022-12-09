<?php
    include '../include/conn.php';

    $table = "CREATE TABLE marks(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        examId INT NOT NULL, 
        section VARCHAR(5) NOT NULL,
        studentId INT NOT NULL, 
        
        mark1 INT NULL,
        mark1Co INT NULL,
 
        
        mark2 INT NULL,
        mark2Co INT NULL,
  

        mark3 INT NULL,
        mark3Co INT NULL,
 
        mark4 INT NULL,
        mark4Co INT NULL,
 
        mark5 INT NULL,
        mark5Co INT NULL,
 

        mark6 INT NULL,
        mark6Co INT NULL,
 

        mark7 INT NULL,
        mark7Co INT NULL,
 

        mark8 INT NULL,
        mark8Co INT NULL,
    

    
        FOREIGN KEY (examId) REFERENCES exam(serial),
        FOREIGN KEY (studentId) REFERENCES student(id)
    )";

    if ($conn->query($table) === TRUE) {
        echo "marks table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
?>