<?php
    include '../include/conn.php';

    $table = "CREATE TABLE co(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        courseId VARCHAR(100) NOT NULL, 
        ploId INT NOT NULL UNIQUE,
        co1 BOOLEAN NULL,
        co2 BOOLEAN NULL,
        co3 BOOLEAN NULL,
        co4 BOOLEAN NULL,
        co5 BOOLEAN NULL,
        co6 BOOLEAN NULL,
        co7 BOOLEAN NULL,
        co8 BOOLEAN NULL,
        co9 BOOLEAN NULL,
        co10 BOOLEAN NULL,
        FOREIGN KEY(courseId) REFERENCES course(id),
        FOREIGN KEY (ploId) REFERENCES plo(serial)
    )";

    if ($conn->query($table) === TRUE) {
        echo "co table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
?>