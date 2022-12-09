<?php
    include '../include/conn.php';

    $table = "CREATE TABLE plo(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        programId VARCHAR(50) NOT NULL, 
        indx INT NOT NULL,
        title VARCHAR(100) NOT NULL,
        description TEXT NULL,
        FOREIGN KEY (programId) REFERENCES program(id)
    )";

    if ($conn->query($table) === TRUE) {
        echo "plo table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
?>