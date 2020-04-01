<?php
//function that gets type assigned to vehicle in database, and returns all types as an array $types
    function get_type() {
        global $db;
        $query = 'SELECT * FROM vehicle_type ';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        return $types;
    }
    
?>
