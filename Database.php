<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Database</title>
    </head>
    <body>
    <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'SEVENTEEN';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');
         $sql = "CREATE TABLE seventeen_tbl( ".
            "seventeen_id INT NOT NULL AUTO_INCREMENT, ".
            "seventeen_last_name VARCHAR(100) NOT NULL, ".
            "seventeen_first_name VARCHAR(40) NOT NULL, ".
            "birthdate_date DATE, ".
            "PRIMARY KEY ( seventeen_id )); ";
         if ($mysqli->query($sql)) {
            printf("Table seventeen_tbl created successfully.<br />");
         }
         if ($mysqli->errno) {
            printf("Could not create table: %s<br />", $mysqli->error);
         }
         $mysqli->close();

//Create database
/*            if($mysqli->query("CREATE DATABASE SEVENTEEN")){
                printf("Database SEVENTEEN created successfully.<br />");
            }

            if ($mysqli->errno){
                printf("Could not create database: %s<br />", $mysqli->error);
            }
*/
            
//Select database
/*            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

            if(!$conn){
                die('Could not connect: ' . $mysqli_error($conn));
            }
            echo 'Connected successfully<br />';
            $retval = mysqli_select_db($conn, 'SEVENTEEN');

            if(!$retval){
                die('Could not select database: ' . mysqli_error($conn));
            }
            echo "Database SEVENTEEN selected succesfully\n";
*/

//Create table
/*            $sql = "CREATE TABLE seventeen_tbl( ".
                            "profile_id INT NOT NULL AUTO_INCREMENT, ".
                            "last_name VARCHAR(100) NOT NULL, ".
                            "first_name VARCHAR(100) NOT NULL, ".
                            "birth_date DATE".
                            "PRIMARY KEY ( profile_id ));";
            if ($mysqli->query($sql)){
                printf("Table SVTProfile created successfully.<br />");
            }
            if ($mysqli->errno){
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            $mysqli->close();
*/
        ?>
    </body>
</html>