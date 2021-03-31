<?php
    $firstname = filter_input(INPUT_GET, "firstname", FILTER_SANITIZE_STRING);
    $footer_type = '';

    // $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    //     if(!$action) {
    //         $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    //     }

    if(!empty($firstname)) {
        $_SESSION['userid'] = $firstname;
        echo "Thank you for registering, ". $firstname; 
        $results = list_vehicles($class_id, $make_id, $type_id, $sort_by); ?>
        <br><p><a href = './index.php'>Click Here</a> to view our vehicle list.</p>
        <?php
    } else {
        unset($_SESSION['userid']);
        switch($action){
            case 'logout':
                include('logout.php');
                break;
            case 'register':
                include('View/register.php');
                break;
            default:
                $results = list_vehicles($class_id, $make_id, $type_id, $sort_by);
                include('View/vehicle_list.php');
                break;    
    }
}
?>