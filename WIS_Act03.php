<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>WIS Activity 03</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 0 auto;
            width: 60%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        table tr td:first-child {
            width: 30%;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"], button {
            padding: 8px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, button {
            background-color: #0056b3;
        }

        h2 {
            margin-top: 20px;
        }

        h2, h3 {
            color: #444;
        }
    </style>
    </head>
    <body>
        <h1>Student Information System</h1>
        <?php
            if(isset($_POST['add'])) {
                $servername = "localhost";
                $user_name = "root";
                $password = "";
                $dbname = "studentinfo";
                
                // Create connection
                $mysqli = new mysqli($servername, $user_name, $password, $dbname);
                
                // Check connection
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                //Insert records
                if(function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) {
                    $username = addslashes ($_POST['username']);
                    $email = addslashes ($_POST['email']);
                } else {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                }
                
                $sql = "INSERT INTO users ".
                    "(username,email) "."VALUES ".
                    "('$username','$email')";

                //Select database
                $retval = mysqli_select_db( $mysqli, 'studentinfo' );

                if(! $retval ) {
                    die('Could not select database: ' . mysqli_error($mysqli));
                }

                //Insert records
                $retval2 = mysqli_query( $mysqli, $sql );
            
                if(! $retval2 ) {
                    die('Could not enter data: ' . mysqli_error($mysqli));
                }

                //Select records
                $sql2 = "SELECT id, username, email FROM users";
                $retval3 = mysqli_query( $mysqli, $sql2 );
                if(! $retval3 ) {
                    die('Could not get data: ' . mysqli_error($mysqli));
                }
                echo "<h2>Users</h2>";
                while($row = mysqli_fetch_array($retval3, MYSQLI_ASSOC)) {
                    echo "____________________________________________________<br /><br />".
                    "ID :{$row['id']}  <br />".
                    "Username: {$row['username']} <br />".
                    "Email: {$row['email']} <br />";
                }
                echo "____________________________________________________<br />";

                echo '<br /><button onclick="goBack()">Create</button>';

                $mysqli->close();
            } else {
        ?>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <h2>Create Record</h2>
            <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Username</td>
                    <td><input name = "username" type = "text" id = "username"></td>
                </tr>         
                <tr>
                    <td width = "250">Email</td>
                    <td><input name = "email" type = "text" id = "email"></td>
                </tr>         
                <tr>
                    <td width = "250"> </td>
                    <td></td>
                </tr>         
                <tr>
                    <td width = "250"> </td>
                    <td><input name = "add" type = "submit" id = "add"  value = "Create"></td>
                </tr>
            </table>
        </form>
        <?php
            }
        ?>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html>