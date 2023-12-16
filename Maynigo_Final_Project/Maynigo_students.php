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
        
        <h1>Students Database</h1>
        
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'MAYNIGO_DB');
            
            //Connecting Database
            if($mysqli->connect_errno ) {
                printf("Connect failed: %s<br />", $mysqli->connect_error);
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['create']) && !isset($_POST['add'])) {
                    echo "<h2>Create Student</h2>";
                    //Displaying form to create student
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Student ID</td>
                                <td><input name = "student_id" type = "text" id = "student_id"></td>
                            </tr>         
                            <tr>
                                <td width = "250">Student Last Name</td>
                                <td><input name = "student_last_name" type = "text" id = "student_last_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Student First Name</td>
                                <td><input name = "student_first_name" type = "text" id = "student_first_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Birth Date</td>
                                <td><input name = "birth_date" type = "date" id = "birth_date"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Student Email</td>
                                <td><input name = "student_email" type = "text" id = "student_email"></td>
                            </tr>   
                            <tr>
                                <td width = "250">Student Contact Number</td>
                                <td><input name = "student_contact" type = "text" id = "student_contact"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "add" type = "submit" id = "add"  value = "Add Student"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['add'])) {                    
                    //Inserting Students
                    $student_id = $_POST['student_id'];
                    $student_last_name = $_POST['student_last_name'];
                    $student_first_name = $_POST['student_first_name'];
                    $birth_date = $_POST['birth_date'];
                    $student_email = $_POST['student_email'];
                    $student_contact = $_POST['student_contact'];
                    
                    $sql = "INSERT INTO students (student_id,student_last_name,student_first_name,birth_date,student_email,student_contact) VALUES ('$student_id','$student_last_name','$student_first_name','$birth_date','$student_email','$student_contact')";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not enter data: ' . mysqli_error($mysqli));
                    }
                    echo "Student Created Successfully.<br />";
                    
                } elseif (isset($_POST['update']) && !isset($_POST['edit'])) {
                    echo "<h2>Update Student</h2>";
                    //Displaying form to update student
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Student ID to be Updated</td>
                                <td><input name = "student_id" type = "text" id = "student_id"></td>
                            </tr>         
                            <tr>
                                <td width = "250">New Student Last Name</td>
                                <td><input name = "student_last_name" type = "text" id = "student_last_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Student First Name</td>
                                <td><input name = "student_first_name" type = "text" id = "student_first_name"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Birth Date</td>
                                <td><input name = "birth_date" type = "date" id = "birth_date"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Student Email</td>
                                <td><input name = "student_email" type = "text" id = "student_email"></td>
                            </tr>   
                            <tr>
                                <td width = "250">New Student Contact Number</td>
                                <td><input name = "student_contact" type = "text" id = "student_contact"></td>
                            </tr>                 
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "edit" type = "submit" id = "edit"  value = "Edit Student"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['edit'])) {
                    //Updating Students
                    $student_id = $_POST['student_id'];
                    $student_last_name = $_POST['student_last_name'];
                    $student_first_name = $_POST['student_first_name'];
                    $birth_date = $_POST['birth_date'];
                    $student_email = $_POST['student_email'];
                    $student_contact = $_POST['student_contact'];
                    
                    $sql = "UPDATE students SET student_last_name='$student_last_name', student_first_name='$student_first_name', birth_date='$birth_date', student_email='$student_email', student_contact='$student_contact' WHERE student_id='$student_id'";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not update data: ' . mysqli_error($mysqli));
                    }
                    echo "Student Information Updated Successfully.<br />";

                } elseif (isset($_POST['delete']) && !isset($_POST['del'])) {
                    echo "<h2>Delete Student</h2>";
                    //Displaying form to delete student
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">ID of Student to be Deleted</td>
                                <td><input name = "student_id" type = "text" id = "student_id"></td>
                            </tr>
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "del" type = "submit" id = "del"  value = "Delete Student"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['del'])) {
                    //Deleting Students
                    $student_id = $_POST['student_id'];
                    
                    $sql = "DELETE FROM students WHERE student_id=$student_id";

                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not delete data: ' . mysqli_error($mysqli));
                    }
                    echo "Student Deleted Successfully.<br />";

                } elseif (isset($_POST['view'])) {
                    //Displaying Students
                    $sql = "SELECT student_id, student_last_name, student_first_name, student_first_name, birth_date, student_email, student_contact FROM students";

                    $retval = mysqli_query( $mysqli, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($mysqli));
                    }
                    
                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                        echo "Student ID :{$row['student_id']}  <br />".
                        "Student Last Name: {$row['student_last_name']} <br />".
                        "Student First Name :{$row['student_first_name']}  <br />".
                        "Birth Date :{$row['birth_date']}  <br />".
                        "Student Email: {$row['student_email']} <br />".
                        "Student Contact Number :{$row['student_contact']}  <br />".
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