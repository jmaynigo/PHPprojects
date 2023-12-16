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
        
        <h1>Instructors Database</h1>
        
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'MAYNIGO_DB');
            
            //Connecting Database
            if($mysqli->connect_errno ) {
                printf("Connect failed: %s<br />", $mysqli->connect_error);
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['create']) && !isset($_POST['add'])) {
                    echo "<h2>Create Instructor</h2>";
                    //Displaying form to create instructor
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Instructor ID</td>
                                <td><input name = "instructor_id" type = "text" id = "instructor_id"></td>
                            </tr>         
                            <tr>
                                <td width = "250">Instructor Last Name</td>
                                <td><input name = "instructor_last_name" type = "text" id = "instructor_last_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Instructor First Name</td>
                                <td><input name = "instructor_first_name" type = "text" id = "instructor_first_name"></td>
                            </tr>    
                            <tr>
                                <td width = "250">Instructor Email</td>
                                <td><input name = "instructor_email" type = "text" id = "instructor_email"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Instructor Contact Number</td>
                                <td><input name = "instructor_contact" type = "text" id = "instructor_contact"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "add" type = "submit" id = "add"  value = "Add Instructor"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['add'])) {                    
                    //Inserting Instructor
                    $instructor_id = $_POST['instructor_id'];
                    $instructor_last_name = $_POST['instructor_last_name'];
                    $instructor_first_name = $_POST['instructor_first_name'];
                    $instructor_email = $_POST['instructor_email'];
                    $instructor_contact = $_POST['instructor_contact'];
                    
                    $sql = "INSERT INTO instructors (instructor_id,instructor_last_name,instructor_first_name,instructor_email,instructor_contact) VALUES ('$instructor_id','$instructor_last_name','$instructor_first_name','$instructor_email','$instructor_contact')";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not enter data: ' . mysqli_error($mysqli));
                    }
                    echo "Instructor Created Successfully.<br />";
                    
                } elseif (isset($_POST['update']) && !isset($_POST['edit'])) {
                    echo "<h2>Update Instructor</h2>";
                    //Displaying form to update instructor
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Instructor ID to be Updated</td>
                                <td><input name = "instructor_id" type = "text" id = "instructor_id"></td>
                            </tr>         
                            <tr>
                                <td width = "250">New Instructor Last Name</td>
                                <td><input name = "instructor_last_name" type = "text" id = "instructor_last_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Instructor First Name</td>
                                <td><input name = "instructor_first_name" type = "text" id = "instructor_first_name"></td>
                            </tr>    
                            <tr>
                                <td width = "250">New Instructor Email</td>
                                <td><input name = "instructor_email" type = "text" id = "instructor_email"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Instructor Contact Number</td>
                                <td><input name = "instructor_contact" type = "text" id = "instructor_contact"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "edit" type = "submit" id = "edit"  value = "Edit Instructor"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['edit'])) {
                    //Updating Instructors
                    $instructor_id = $_POST['instructor_id'];
                    $instructor_last_name = $_POST['instructor_last_name'];
                    $instructor_first_name = $_POST['instructor_first_name'];
                    $instructor_email = $_POST['instructor_email'];
                    $instructor_contact = $_POST['instructor_contact'];
                    
                    $sql = "UPDATE instructors SET instructor_last_name='$instructor_last_name', instructor_first_name='$instructor_first_name', instructor_email='$instructor_email', instructor_contact='$instructor_contact' WHERE instructor_id='$instructor_id'";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not update data: ' . mysqli_error($mysqli));
                    }
                    echo "Instructor Information Updated Successfully.<br />";

                } elseif (isset($_POST['delete']) && !isset($_POST['del'])) {
                    echo "<h2>Delete Instructor</h2>";
                    //Displaying form to delete instructor
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">ID of Instructor to be Deleted</td>
                                <td><input name = "instructor_id" type = "text" id = "instructor_id"></td>
                            </tr>
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "del" type = "submit" id = "del"  value = "Delete Instructor"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['del'])) {
                    //Deleting Instructor
                    $instructor_id = $_POST['instructor_id'];
                    
                    $sql = "DELETE FROM instructors WHERE instructor_id=$instructor_id";

                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not delete data: ' . mysqli_error($mysqli));
                    }
                    echo "Instructor Deleted Successfully.<br />";

                } elseif (isset($_POST['view'])) {
                    //Displaying Instructors
                    $sql = "SELECT instructor_id,instructor_last_name,instructor_first_name,instructor_email,instructor_contact FROM instructors";

                    $retval = mysqli_query( $mysqli, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($mysqli));
                    }
                    
                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                        echo "Instructor ID :{$row['instructor_id']}  <br />".
                        "Instructor Last Name: {$row['instructor_last_name']} <br />".
                        "Instructor First Name :{$row['instructor_first_name']}  <br />".
                        "Instructor Email: {$row['instructor_email']} <br />".
                        "Instructor Contact Number :{$row['instructor_contact']}  <br />".
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