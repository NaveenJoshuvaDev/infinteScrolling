<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

    $response = array(
        'data' => array(
            'first_name' => $first_name,
            'last_name' => $last_name
        )
    );
    
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}
?>
