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
                margin-bottom: 30px;
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
        <h1>Student Information System</h1>
        
        <h2>Select which database to view or edit:</h2>
        
        <form action="#" method="get">
            <button type="submit" formaction="Maynigo_users.php">Users</button>
            <button type="submit" formaction="Maynigo_students.php">Students</button>
            <button type="submit" formaction="Maynigo_instructors.php">Instructors</button>
            <button type="submit" formaction="Maynigo_courses.php">Courses</button>
            <button type="submit" formaction="Maynigo_enrollment.php">Enrollment</button>
        </form>

    </body>
</html>