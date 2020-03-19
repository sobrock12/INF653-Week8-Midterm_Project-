<?php
    function get_vehicle_class() {
        global $db;
        $query = 'SELECT * FROM vehicle_class ';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        return $classes;
    }

    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO vehicle_class (`class`) 
                    VALUES (:class_name);';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();   
    }

    function delete_class($class_code) {
        global $db;
        $query = 'DELETE FROM vehicle_class WHERE class_code = :class_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
    }
    
?>
    