<?php
    include '../include/conn.php';

    $table = "CREATE TABLE course(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(100) NOT NULL UNIQUE, 
        programId VARCHAR(50) NOT NULL UNIQUE,
        title VARCHAR(200) NOT NULL,
        credit DOUBLE NOT NULL,
        FOREIGN KEY (programId) REFERENCES program(id)
    )";

    if ($conn->query($table) === TRUE) {
        echo "course table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
?>