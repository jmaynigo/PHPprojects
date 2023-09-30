<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Constants</title>
    </head>
    <body>
        <?php
            define("MINSIZE", 50);
            echo MINSIZE;
            echo constant("MINSIZE"); // same thing as the previous line

            // Valid constant names
            define("ONE", "first thing");
            define("TWO2", "second thing");
            define("THREE_3", "third thing");
            // Invalid constant names
            define("2TWO", "second thing");
            define("__THREE__", "third value");
        ?>
    </body>
</html>