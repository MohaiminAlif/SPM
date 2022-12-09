<?php
    include '../include/conn.php';

    $table = "CREATE TABLE program(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(50) NOT NULL UNIQUE, 
        title VARCHAR(200) NOT NULL,
        school VARCHAR(200) NOT NULL
    )";

    if ($conn->query($table) === TRUE) {
        echo "program table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
?>