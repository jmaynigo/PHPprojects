<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>WIS Act 03: Update</title>
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
            
            // Update data
            $newUsername = "UpdatedJohnDoe";
            $idToUpdate = 1;
            
            $sql = "UPDATE users SET username='$newUsername' WHERE id=$idToUpdate";
            
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            // Close connection
            $conn->close();                    
        ?>
    </body>
</html>