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

            $mysql_connect = new mysqli($dbhost, $dbuser, $dbpass);

            if($mysql_connect->connect_errno){
                printf("Connect failed: %,br />", $mysql_connect->connect_error);
                exit();
            }
            printf('Connected successfully.<br />');

            if($mysql_connect->query("CREATE DATABASE SEVENTEEN")){
                printf("Database SEVENTEEN created successfully.<br />");
            }

            if ($mysql_connect->errno){
                printf("Could not create database: %s<br />", $mysql_connect->error);
            }
            
            $first_table = "CREATE TABLE SVTProfile( ".
                            "profile_id INT NOT NULL AUTO_INCREMENT, ".
                            "first_name VARCHAR(100) NOT NULL, ".
                            "last_name VARCHAR(100) NOT NULL, ".
                            "PRIMARY KEY ( profile_id )); ";
                        if ($mysql_connect->query($first_table)){
                            printf("Table SVTProfile created successfully.<br />");
                        }
                        if ($mysql_connect->errno){
                            printf("Could not create table: %s<br />", $mysql_connect->error);
                        }

            $mysql_connect->close();
        ?>
    </body>
</html>