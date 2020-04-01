<?php
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';

    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>