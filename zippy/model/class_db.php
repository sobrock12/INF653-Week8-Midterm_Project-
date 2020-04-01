<?php
//function to get all vehicle classes from vehicle_class table in database, returns all info in table in $classes array
    function get_vehicle_class() {
        global $db;
        $query = 'SELECT * FROM vehicle_class ';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        return $classes;
    }
    
?>
