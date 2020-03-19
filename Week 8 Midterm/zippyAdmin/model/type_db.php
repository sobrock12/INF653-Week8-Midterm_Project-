<?php
    function get_type() {
        global $db;
        $query = 'SELECT * FROM vehicle_type ';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        return $types;
    }

    function add_type($type_name) {
        global $db;
        $query = 'INSERT INTO vehicle_type (`type`) 
                    VALUES (:type_name);';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();   
    }

    function delete_type($type_code) {
        global $db;
        $query = 'DELETE FROM vehicle_type WHERE type_code = :type_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $statement->closeCursor();
    }
    
?>