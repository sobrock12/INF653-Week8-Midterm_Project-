<?php
    function get_type() {
        global $db;
        $query = 'SELECT * FROM vehicle_type ';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        return $types;
    }
    
?>