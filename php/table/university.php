

<?php
    include '../include/conn.php';

    $table = "CREATE TABLE university(
        serial INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id INT NOT NULL UNIQUE, 
        universityName VARCHAR(100) NOT NULL UNIQUE
    )";

    if ($conn->query($table) === TRUE) {
        echo "university table is here.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

?>