<?php
    function get_all_vehicles() {
        global $db;
        $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price
                FROM vehicles V
                    LEFT JOIN vehicle_class C
                        ON V.class_code = C.class_code
                    LEFT JOIN vehicle_type T
                        ON V.type_code = T.type_code';
        $statement = $db->prepare($query);
        $statement->execute();
        $all_vehicles = $statement->fetchAll();
        return $all_vehicles;
    }

    function get_vehicles_by_criteria($make_selection, $type_selection, $class_selection, $sort_selection) {
    if ($sort_selection == '0') {  
        global $db;
        if ($make_selection == "0" && $type_selection == NULL && $class_selection == NULL) {
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price 
                    FROM vehicles V 
                        LEFT JOIN vehicle_class C 
                            ON V.class_code = C.class_code 
                        LEFT JOIN vehicle_type T 
                            ON V.type_code = T.type_code 
                    ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price 
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == !NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code 
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE T.type_code = :type_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == !NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE T.type_code = :type_selection && C.class_code = :class_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE C.class_code = :class_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == !NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && T.type_code = :type_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && C.class_code = :class_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if($make_selection !=="0" && $type_selection == !NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && T.type_code = :type_selection && C.class_code = :class_selection
            ORDER BY price DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':type_selection', $type_selection);                
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        }

    }else if ($sort_selection == '1') {
        global $db;
        if ($make_selection == "0" && $type_selection == NULL && $class_selection == NULL) {
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price 
                    FROM vehicles V 
                        LEFT JOIN vehicle_class C 
                            ON V.class_code = C.class_code 
                        LEFT JOIN vehicle_type T 
                            ON V.type_code = T.type_code 
                    ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price 
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == !NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code 
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE T.type_code = :type_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == !NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE T.type_code = :type_selection && C.class_code = :class_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection =="0" && $type_selection == NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE C.class_code = :class_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == !NULL && $class_selection == NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && T.type_code = :type_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':type_selection', $type_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if ($make_selection !=="0" && $type_selection == NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && C.class_code = :class_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        } else if($make_selection !=="0" && $type_selection == !NULL && $class_selection == !NULL) { 
            $query = 'SELECT V.year, V.make, V.model, T.type, C.class, V.price, T.type_code, C.class_code
            FROM vehicles V 
                LEFT JOIN vehicle_class C 
                    ON V.class_code = C.class_code 
                LEFT JOIN vehicle_type T 
                    ON V.type_code = T.type_code 
                WHERE V.make = :make_selection && T.type_code = :type_selection && C.class_code = :class_selection
            ORDER BY year DESC ';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_selection', $make_selection);
        $statement->bindValue(':type_selection', $type_selection);                
        $statement->bindValue(':class_selection', $class_selection);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

        }

    }

}

    
?>