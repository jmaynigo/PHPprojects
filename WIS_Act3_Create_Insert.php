<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>WIS Act 03: Create (Insert)</title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "studentinfo";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Insert data
            $username = "JohnDoe";
            $email = "john@example.com";
            
            $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            // Close connection
            $conn->close();                    
        ?>
    </body>
</html>