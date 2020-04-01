<?php
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/type_db.php');
    require('model/class_db.php');


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }

    if ($action == 'list_vehicles') {
        $all_vehicles = get_all_vehicles();
        $make_selection = isset($_GET['make_selection']) ? $_GET['make_selection'] : '0';
        $type_selection = filter_input(INPUT_GET, 'type_selection', FILTER_VALIDATE_INT);
        $class_selection = filter_input(INPUT_GET, 'class_selection', FILTER_VALIDATE_INT);
        $sort_selection = isset($_GET['sort_selection']) ? $_GET['sort_selection'] : '0';
        
        $types = get_type();
        $classes = get_vehicle_class();
        $vehicles = get_vehicles_by_criteria($make_selection, $type_selection, $class_selection, $sort_selection);
        include('vehicle_list.php');
    }
?>