<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Maynigo Final Project</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                text-align: center;
            }

            h1 {
                color: #333;
                margin-bottom: 20px;
            }

            h2 {
                color: #666;
                margin-bottom: 15px;
            }

            button {
                padding: 10px 20px;
                margin: 5px;
                font-size: 16px;
                cursor: pointer;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #45a049;
            }

            form {
                margin-bottom: 30px;
            }

            table {
                width: 60%;
                margin: 0 auto;
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <form action="#" method="get">
            <button type="submit" formaction="Maynigo_main.php">Back to Main</button>
        </form>
        
        <h1>Users Database</h1>
        
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'MAYNIGO_DB');
            
            //Connecting Database
            if($mysqli->connect_errno ) {
                printf("Connect failed: %s<br />", $mysqli->connect_error);
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['create']) && !isset($_POST['add'])) {
                    echo "<h2>Create User</h2>";
                    //Displaying form to create user
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Username</td>
                                <td><input name = "user_name" type = "text" id = "user_name"></td>
                            </tr>         
                            <tr>
                                <td width = "250">User Email</td>
                                <td><input name = "user_email" type = "text" id = "user_email"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "add" type = "submit" id = "add"  value = "Add User"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['add'])) {                    
                    //Inserting Users
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    
                    $sql = "INSERT INTO users (user_name,user_email) VALUES ('$user_name','$user_email')";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not enter data: ' . mysqli_error($mysqli));
                    }
                    echo "User Created Successfully.<br />";
                    
                } elseif (isset($_POST['update']) && !isset($_POST['edit'])) {
                    echo "<h2>Update User</h2>";
                    //Displaying form to update user
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">User ID to be Updated</td>
                                <td><input name = "user_id" type = "text" id = "user_id"></td>
                            </tr>
                            <tr>
                                <td width = "250">New Username</td>
                                <td><input name = "user_name" type = "text" id = "user_name"></td>
                            </tr>         
                            <tr>
                                <td width = "250">New User Email</td>
                                <td><input name = "user_email" type = "text" id = "user_email"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "edit" type = "submit" id = "edit"  value = "Edit User"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['edit'])) {
                    //Updating Users
                    $user_id = $_POST['user_id'];
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    
                    $sql = "UPDATE users SET user_name='$user_name', user_email='$user_email' WHERE user_id='$user_id'";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not update data: ' . mysqli_error($mysqli));
                    }
                    echo "User Information Updated Successfully.<br />";

                } elseif (isset($_POST['delete']) && !isset($_POST['del'])) {
                    echo "<h2>Delete User</h2>";
                    //Displaying form to delete user
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">ID of User to be Deleted</td>
                                <td><input name = "user_id" type = "text" id = "user_id"></td>
                            </tr>
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "del" type = "submit" id = "del"  value = "Delete User"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['del'])) {
                    //Deleting Users
                    $user_id = $_POST['user_id'];
                    
                    $sql = "DELETE FROM users WHERE user_id=$user_id";

                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not delete data: ' . mysqli_error($mysqli));
                    }
                    echo "User Deleted Successfully.<br />";

                } elseif (isset($_POST['view'])) {
                    //Displaying Users
                    $sql = "SELECT user_id, user_name, user_email FROM users";

                    $retval = mysqli_query( $mysqli, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($mysqli));
                    }
                    
                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                        echo "User ID :{$row['user_id']}  <br />".
                        "User Name: {$row['user_name']} <br />".
                        "User Email: {$row['user_email']} <br />".
                        "--------------------------------<br />";
                    } 
                }

                $mysqli->close();
            }
        ?>
        
        <h2>Select which action to perform:</h2>
        <form method="post">
            <button type="submit" name="create">Create</button>
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
            <button type="submit" name="view">View</button>
        </form>
    </body>
</html>