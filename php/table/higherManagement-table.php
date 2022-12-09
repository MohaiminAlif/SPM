<?php
    include '../include/conn.php';

    $table = "CREATE TABLE higherManagement(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id INT NOT NULL UNIQUE, 
        firstName VARCHAR(100) NOT NULL,
        lastName VARCHAR(100) NOT NULL,
        email VARCHAR(250) NOT NULL UNIQUE,
        password VARCHAR(200) NOT NULL
    )";

    if ($conn->query($table) === TRUE) {
        echo "higherManagement table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

?>