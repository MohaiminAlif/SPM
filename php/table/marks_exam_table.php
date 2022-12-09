
<?php
    include '../include/conn.php';
    $table = "CREATE TABLE marks_exam(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        student_id INT(100) NOT NULL,
        course_id VARCHAR(100) NOT NULL,
        exam_name VARCHAR(200) NOT NULL,
        semester VARCHAR(200) NOT NULL,
        section VARCHAR(5) NOT NULL,
        q1_mark INT NULL, 
        q1_co INT NULL,
        q1_max INT NULL,
        q2_mark INT NULL, 
        q2_co INT NULL,
        q2_max INT NULL,
        q3_mark INT NULL, 
        q3_co INT NULL,
        q3_max INT NULL,
        q4_mark INT NULL, 
        q4_co INT NULL,
        q4_max INT NULL,
        q5_mark INT NULL, 
        q5_co INT NULL,
        q5_max INT NULL,
        q6_mark INT NULL, 
        q6_co INT NULL,
        q6_max INT NULL,
        q7_mark INT NULL, 
        q7_co INT NULL,
        q7_max INT NULL,
        q8_mark INT NULL, 
        q8_co INT NULL,
        q8_max INT NULL,
        FOREIGN KEY (student_id) REFERENCES student(id)
 
        )";

        if ($conn->query($table) === TRUE) {
            echo "admin table is here.<br>";
        } else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
?>