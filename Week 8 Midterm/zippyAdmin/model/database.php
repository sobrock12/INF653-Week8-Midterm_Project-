<?php
    $dsn = 'mysql:host=qbhol6k6vexd5qjs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=y5wvftaqzfik8fcu';
    $username = 'f7vcx3gkmqihlouf';
    $password = 'fqfappo0bfpmamx9';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
