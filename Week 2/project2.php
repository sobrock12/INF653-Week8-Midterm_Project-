<?php

    if(!isset($first)) {
        $first = '';
    }

    if(!isset($last)) {
        $last = '';
    }

    if(!isset($age)) {
        $age = '';
    }

?>

<!DOCTYPE html>

<html>

    <head>
        <title>Project 2</title>
    <head>

    <style>
        <?php include 'project2.css'; ?>
    </style>

    <body>
    <div id = 'userform'>
        <form method="GET" action="project2.php">

            <div>
                <label>First Name: </label><br>
                <input type="text" name="first">
            </div>

            <div>
                <label>Last Name: </label><br>
                <input type="text" name="last">
            </div>

            <div>
                <label>Age: </label><br>
                <input type="text" name="age">
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php

        if(isset($_GET['first'])) {
            $first = htmlentities($_GET['first']);
        }

        if(isset($_GET['last'])) {
        $last = htmlentities($_GET['last']);
        }

        if(isset($_GET['age'])) {
        $age = htmlentities($_GET['age']);
        }


        if($age < 18 && !empty($age)) {
            echo "Hello, my name is {$first} {$last}. I am {$age} years old and I am not old enough to vote in the United States.";
        }

        if($age >= 18  && !empty($age)) {
            echo "Hello, my name is {$first} {$last}. I am {$age} years old and I am old enough to vote in the United States.";
        }

    ?>

    </body>

</html>


