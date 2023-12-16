<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Final Project Setup</title>
    </head>
    <body>
        <?php
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
            
            //Connecting Database
            if($mysqli->connect_errno ) {
                printf("Connect failed: %s<br />", $mysqli->connect_error);
                exit();
            }
            printf('Connected successfully.<br />');
            
            //Creating Database
            if($mysqli->query("CREATE DATABASE MAYNIGO_DB")) {
                printf("Database MAYNIGO_DB created successfully.<br />");
            }
            if($mysqli->errno) {
                printf("Could not create database: %s<br />", $mysqli->error);
            }

            //Selecting Database
            $retval = mysqli_select_db( $mysqli, 'MAYNIGO_DB' );

            if(! $retval ) {
                die('Could not select database: ' . mysqli_error($mysqli));
            }
            echo "Database MAYNIGO_DB selected successfully.<br />";
            
            //Creating Table
            $sql = "CREATE TABLE users( ".
                "user_id INT NOT NULL AUTO_INCREMENT, ".
                "user_name VARCHAR(255) NOT NULL, ".
                "user_email VARCHAR(255) NOT NULL, ".
                "PRIMARY KEY ( user_id )); ";
            if ($mysqli->query($sql)) {
                printf("Table users created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            //Creating Table
            $sql = "CREATE TABLE students( ".
                "student_id VARCHAR(255) NOT NULL, ".
                "student_last_name VARCHAR(255) NOT NULL, ".
                "student_first_name VARCHAR(255) NOT NULL, ".
                "birth_date DATE, ".
                "student_email VARCHAR(255) NOT NULL, ".
                "student_contact VARCHAR(11), ".
                "PRIMARY KEY ( student_id )); ";
            if ($mysqli->query($sql)) {
                printf("Table students created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            //Creating Table
            $sql = "CREATE TABLE instructors( ".
                "instructor_id VARCHAR(255) NOT NULL, ".
                "instructor_last_name VARCHAR(255) NOT NULL, ".
                "instructor_first_name VARCHAR(255) NOT NULL, ".
                "instructor_email VARCHAR(255) NOT NULL, ".
                "instructor_contact VARCHAR(11), ".
                "PRIMARY KEY ( instructor_id )); ";
            if ($mysqli->query($sql)) {
                printf("Table instructors created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            //Creating Table
            $sql = "CREATE TABLE courses( ".
                "course_id VARCHAR(255) NOT NULL, ".
                "course_name VARCHAR(255) NOT NULL, ".
                "course_credits INT NOT NULL, ".
                "instructor_id VARCHAR(255) NOT NULL, ".
                "PRIMARY KEY ( course_id ), ".
                "FOREIGN KEY ( instructor_id ) REFERENCES instructors( instructor_id ) ON DELETE CASCADE ON UPDATE CASCADE); ";
            if ($mysqli->query($sql)) {
                printf("Table courses created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            //Creating Table
            $sql = "CREATE TABLE enrollment( ".
                "enrollment_id INT NOT NULL AUTO_INCREMENT, ".
                "student_id VARCHAR(255) NOT NULL, ".
                "course_id VARCHAR(255) NOT NULL, ".
                "enrollment_date DATE NOT NULL DEFAULT (CURRENT_DATE), ".
                "grade INT NOT NULL, ".
                "PRIMARY KEY ( enrollment_id ), ".
                "FOREIGN KEY ( student_id ) REFERENCES students( student_id ) ON DELETE CASCADE ON UPDATE CASCADE, ".
                "FOREIGN KEY ( course_id ) REFERENCES courses( course_id ) ON DELETE CASCADE ON UPDATE CASCADE); ";
            if ($mysqli->query($sql)) {
                printf("Table enrollment created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            $mysqli->close();
        ?>
    </body>
</html>