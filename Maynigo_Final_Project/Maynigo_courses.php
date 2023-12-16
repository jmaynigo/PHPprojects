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
        
        <h1>Courses Database</h1>
        
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'MAYNIGO_DB');
            
            //Connecting Database
            if($mysqli->connect_errno ) {
                printf("Connect failed: %s<br />", $mysqli->connect_error);
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['create']) && !isset($_POST['add'])) {
                    echo "<h2>Create Course</h2>";
                    //Displaying form to create course
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">Course ID</td>
                                <td><input name = "course_id" type = "text" id = "course_id"></td>
                            </tr>
                            <tr>
                                <td width = "250">Course Name</td>
                                <td><input name = "course_name" type = "text" id = "course_name"></td>
                            </tr>         
                            <tr>
                                <td width = "250">Course Credits</td>
                                <td><input name = "course_credits" type = "text" id = "course_credits"></td>
                            </tr> 
                            <tr>
                                <td width = "250">Instructor ID</td>
                                <td><input name = "instructor_id" type = "text" id = "instructor_id"></td>
                            </tr>                
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "add" type = "submit" id = "add"  value = "Add Course"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['add'])) {                    
                    //Inserting Course
                    $course_id = $_POST['course_id'];
                    $course_name = $_POST['course_name'];
                    $course_credits = $_POST['course_credits'];
                    $instructor_id = $_POST['instructor_id'];
                    
                    $sql = "INSERT INTO courses (course_id,course_name,course_credits,instructor_id) VALUES ('$course_id','$course_name','$course_credits','$instructor_id')";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not enter data: ' . mysqli_error($mysqli));
                    }
                    echo "Course Created Successfully.<br />";
                    
                } elseif (isset($_POST['update']) && !isset($_POST['edit'])) {
                    echo "<h2>Update Course</h2>";
                    //Displaying form to update course
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                        <tr>
                                <td width = "250">Course ID to be Updated</td>
                                <td><input name = "course_id" type = "text" id = "course_id"></td>
                            </tr>
                            <tr>
                                <td width = "250">New Course Name</td>
                                <td><input name = "course_name" type = "text" id = "course_name"></td>
                            </tr>         
                            <tr>
                                <td width = "250">New Course Credits</td>
                                <td><input name = "course_credits" type = "text" id = "course_credits"></td>
                            </tr> 
                            <tr>
                                <td width = "250">New Instructor ID</td>
                                <td><input name = "instructor_id" type = "text" id = "instructor_id"></td>
                            </tr>                
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "edit" type = "submit" id = "edit"  value = "Edit Course"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['edit'])) {
                    //Updating Courses
                    $course_id = $_POST['course_id'];
                    $course_name = $_POST['course_name'];
                    $course_credits = $_POST['course_credits'];
                    $instructor_id = $_POST['instructor_id'];
                    
                    $sql = "UPDATE courses SET course_name='$course_name', course_credits='$course_credits', instructor_id='$instructor_id' WHERE course_id='$course_id'";
    
                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not update data: ' . mysqli_error($mysqli));
                    }
                    echo "Course Information Updated Successfully.<br />";

                } elseif (isset($_POST['delete']) && !isset($_POST['del'])) {
                    echo "<h2>Delete Course</h2>";
                    //Displaying form to delete course
        ?>
                    <form method = "post">
                        <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                            <tr>
                                <td width = "250">ID of Course to be Deleted</td>
                                <td><input name = "course_id" type = "text" id = "course_id"></td>
                            </tr>
                            <tr>
                                <td width = "250"> </td>
                                <td><input name = "del" type = "submit" id = "del"  value = "Delete Course"></td>
                            </tr>
                        </table>
                    </form>
        <?php
                } elseif (isset($_POST['del'])) {
                    //Deleting Courses
                    $course_id = $_POST['course_id'];
                    
                    $sql = "DELETE FROM courses WHERE course_id=$course_id";

                    $retval = mysqli_query( $mysqli, $sql );
                
                    if(! $retval ) {
                        die('Could not delete data: ' . mysqli_error($mysqli));
                    }
                    echo "Course Deleted Successfully.<br />";

                } elseif (isset($_POST['view'])) {
                    //Displaying Courses
                    $sql = "SELECT course_id, course_name, course_credits, instructor_id FROM courses";

                    $retval = mysqli_query( $mysqli, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($mysqli));
                    }
                    
                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                        echo "Course ID :{$row['course_id']}  <br />".
                        "Course Name: {$row['course_name']} <br />".
                        "Course Credits: {$row['course_credits']} <br />".
                        "Instructor ID :{$row['instructor_id']}  <br />".
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