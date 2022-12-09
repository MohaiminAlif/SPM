<?php
    include '../include/conn.php';

    $table = "CREATE TABLE student(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id INT NOT NULL UNIQUE, 
        firstName VARCHAR(100) NOT NULL,
        lastName VARCHAR(100) NOT NULL,
        email VARCHAR(250) NOT NULL UNIQUE,
        programId VARCHAR(50) NOT NULL,
        password VARCHAR(200) NOT NULL,
        uName VARCHAR(100) NOT NULL,
        FOREIGN KEY (uName) REFERENCES university(universityName),
        FOREIGN KEY (programID) REFERENCES program(id)
        
    )";

    if ($conn->query($table) === TRUE) {
        echo "students table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

?>