//index.php is the main controller page for the app. it gets an action from other pages with forms via a $_GET or a $_POST
//function and then passes variables to other php scripts, which then perform actions like running SQL queries for viewing
//adding, deleting, and displaying data from the database tables

<?php
    require('model/database.php');              //provides access to database with vehicle tables
    require('model/vehicle_db.php');            //contains vehicle database functions
    require('model/type_db.php');               //contains functions for manipulating types
    require('model/class_db.php');              //contains functions for manipulating classes


//checks to see if variable $action was set from a different page of the app via a POST or GET command, sets $action to null
//if no $action is found. then an if statement checks if $action is null, if it is it runs the if statement under the 'list_vehicles'
//action
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }


//default action. when page is loaded, this action is ran, showing all vehilces info contained in the database
//also handles what happens when user selects different sort options. receives variables and runs the sort and display
//function get_vehicles_by_criteria. after this is ran, the vehicle_list.php page is shown.
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
