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
        include('zippy_admin_vehicle_list.php');

    } else if ($action == 'show_add_vehicle_form') {
        $vehicle_info = get_all_vehicles();
        $types = get_type();
        $classes = get_vehicle_class();
        include('add_vehicle_form.php');

    } else if ($action == 'add_vehicle') {
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        if ($year == NULL || $make == NULL || $model == NULL || $price == NULL ||
             $type_code == NULL || $class_code == NULL) {
                 $error = "Invalid vehicle data. Check all fields and try again.";
                 include ('errors/error.php');
             } else {
                 add_vehicle($year, $make, $model, $price, $type_code, $class_code);
                 header("Location: zippy_admin_index.php");
             }

    } else if ($action == 'edit_types') {
        $vehicle_info = get_all_vehicles();
        $types = get_type();
        $classes = get_vehicle_class();
        include('edit_types.php');

    } else if ($action == 'add_type') {
        $type_name = filter_input(INPUT_POST, 'type_name');
        add_type($type_name);
        header("Location: zippy_admin_index.php?action=edit_types");
    
    } else if ($action == 'delete_type') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        if ($type_code == NULL || $type_code == FALSE) {
            $error = "Missing or incorrect type code.";
            include('errors/error.php');
        } else {
            delete_type($type_code);
            header("Location: zippy_admin_index.php?action=edit_types");
        }

    } else if ($action == 'edit_classes') {
        $vehicle_info = get_all_vehicles();
        $types = get_type();
        $classes = get_vehicle_class();
        include('edit_classes.php');

    } else if ($action == 'add_class') {
        $class_name = filter_input(INPUT_POST, 'class_name');
        add_class($class_name);
        header("Location: zippy_admin_index.php?action=edit_classes");
    
    } else if ($action == 'delete_class') {
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        if ($class_code == NULL || $class_code == FALSE) {
            $error = "Missing or incorrect class code.";
            include('errors/error.php');
        } else {
            delete_class($class_code);
            header("Location: zippy_admin_index.php?action=edit_classes");
        }

    } else if ($action == 'delete_vehicle') {
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

        if ($vehicle_id == NULL || $vehicle_id == FALSE) {
            $error = "Missing or incorrect vehicle id";
            include('errors/error.php');
        } else {
        delete_vehicle($vehicle_id);
        header("Location: zippy_admin_index.php");

        }
    }
    
?>