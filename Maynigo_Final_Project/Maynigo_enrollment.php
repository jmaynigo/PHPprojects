<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maynigo Final Project</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                padding: 0;
                text-align: center;
            }

            h1 {
                color: #333;
                margin-bottom: 20px;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            table th, table td {
                padding: 12px 15px;
                border: 1px solid #ddd;
            }

            table th {
                background-color: #f4f4f4;
                font-weight: bold;
            }

            form {
                margin-bottom: 30px;
            }

            input[type="text"], input[type="submit"] {
                padding: 8px;
                margin: 5px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
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
        </style>
    </head>
    <body>
        <form action="#" method="get">
            <button type="submit" formaction="Maynigo_main.php">Back to Main</button>
        </form>

        <h1>Enrollment Database</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Enrollment ID</th>
                    <th>Student ID</th>
                    <th>Course ID</th>
                    <th>Enrollment Date</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mysqli = new mysqli('localhost', 'root', '', 'MAYNIGO_DB');

                // Connecting Database
                if ($mysqli->connect_errno) {
                    printf("Connect failed: %s<br />", $mysqli->connect_error);
                    exit();
                }

                if (isset($_POST['enroll'])) {
                    $student_id = $_POST['student_id'];
                    $course_id = $_POST['course_id'];
                    $grade = $_POST['grade'];

                    $sql = "INSERT INTO enrollment (student_id, course_id, grade) VALUES ('$student_id', '$course_id', '$grade')";

                    // Inserting Records
                    $retval = $mysqli->query($sql);

                    if (!$retval) {
                        die('Could not enter data: ' . $mysqli->error);
                    }
                }

                $sql = "SELECT * FROM enrollment";
                $result = $mysqli->query($sql);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['enrollment_id']}</td>
                                <td>{$row['student_id']}</td>
                                <td>{$row['course_id']}</td>
                                <td>{$row['enrollment_date']}</td>
                                <td>{$row['grade']}</td>
                            </tr>";
                    }
                    $result->free(); 
                } else {
                    echo "Error: " . $mysqli->error;
                }

                $mysqli->close();
                ?>
            </tbody>
        </table>

        <form method="post">
            <table width="600" border="0" cellspacing="1" cellpadding="2">
                <tr>
                    <td width="250">Student ID</td>
                    <td><input name="student_id" type="text" id="student_id"></td>
                </tr>
                <tr>
                    <td width="250">Course ID</td>
                    <td><input name="course_id" type="text" id="course_id"></td>
                </tr>
                <tr>
                    <td width="250">Grade</td>
                    <td><input name="grade" type="text" id="grade"></td>
                </tr>
                <tr>
                    <td width="250"> </td>
                    <td><input name="enroll" type="submit" id="enroll" value="Submit for Enrollment"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
