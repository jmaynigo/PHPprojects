<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>PHP MySQL Activity</title>
    </head>
    <body>
        <?php
            if(isset($_POST['add'])) {
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'RECORDS';
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                
                //Connecting Database
                if($mysqli->connect_errno ) {
                    printf("Connect failed: %s<br />", $mysqli->connect_error);
                    exit();
                }
                printf('Connected successfully.<br />');
                
                //Creating Database
    /*          if ($mysqli->query("CREATE DATABASE RECORDS")) {
                    printf("Database RECORDS created successfully.<br />");
                }
                if($mysqli->errno) {
                    printf("Could not create database: %s<br />", $mysqli->error);
                }
    */
                //Creating Table
    /*            $sql = "CREATE TABLE students_tbl( ".
                    "students_number INT NOT NULL AUTO_INCREMENT, ".
                    "students_last_name VARCHAR(100) NOT NULL, ".
                    "students_first_name VARCHAR(100) NOT NULL, ".
                    "birth_date DATE, ".
                    "PRIMARY KEY ( students_number )); ";
                if ($mysqli->query($sql)) {
                    printf("Table students_tbl created successfully.<br />");
                }
                if ($mysqli->errno) {
                    printf("Could not create table: %s<br />", $mysqli->error);
                }
    */
                //Inserting Records
                if(function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) {
                    $students_last_name = addslashes ($_POST['students_last_name']);
                    $students_first_name = addslashes ($_POST['students_first_name']);
                } else {
                    $students_last_name = $_POST['students_last_name'];
                    $students_first_name = $_POST['students_first_name'];
                }
                $birth_date = $_POST['birth_date'];
                
                $sql = "INSERT INTO students_tbl ".
                    "(students_last_name,students_first_name, birth_date) "."VALUES ".
                    "('$students_last_name','$students_first_name','$birth_date')";

                //Selecting Database
                $retval = mysqli_select_db( $mysqli, 'RECORDS' );

                if(! $retval ) {
                    die('Could not select database: ' . mysqli_error($mysqli));
                }
                echo "Database RECORDS selected successfully.<br />";

                //Inserting Records
                $retval2 = mysqli_query( $mysqli, $sql );
            
                if(! $retval2 ) {
                    die('Could not enter data: ' . mysqli_error($mysqli));
                }
                echo "Entered data successfully.<br />";

                //Selecting Records
                $sql2 = "SELECT students_number, students_last_name, students_first_name, birth_date FROM students_tbl";
                $retval3 = mysqli_query( $mysqli, $sql2 );
                if(! $retval3 ) {
                    die('Could not get data: ' . mysqli_error($mysqli));
                }
                
                while($row = mysqli_fetch_array($retval3, MYSQLI_ASSOC)) {
                    echo "Student Number :{$row['students_number']}  <br />".
                    "Last Name: {$row['students_last_name']} <br />".
                    "First Name: {$row['students_first_name']} <br />".
                    "Birth Date : {$row['birth_date']} <br />".
                    "--------------------------------<br />";
                } 
                echo "Fetched data successfully.<br />";

                $mysqli->close();
            } else {
        ?>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Students Last Name</td>
                    <td><input name = "students_last_name" type = "text" id = "students_last_name"></td>
                </tr>         
                <tr>
                    <td width = "250">Students First Name</td>
                    <td><input name = "students_first_name" type = "text" id = "students_first_name"></td>
                </tr>         
                <tr>
                    <td width = "250">Birth Date [   yyyy-mm-dd ]</td>
                    <td><input name = "birth_date" type = "text" id = "birth_date"></td>
                </tr>      
                <tr>
                    <td width = "250"> </td>
                    <td></td>
                </tr>         
                <tr>
                    <td width = "250"> </td>
                    <td><input name = "add" type = "submit" id = "add"  value = "Add Record"></td>
                </tr>
            </table>
        </form>
    <?php
        }
    ?>
    </body>
</html>