<?php
    function get_vehicle_class() {
        global $db;
        $query = 'SELECT * FROM vehicle_class ';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        return $classes;
    }
    
?>