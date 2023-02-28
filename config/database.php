<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'ali');
    define('DB_PASS', '123456');
    define('DB_NAME', 'PHP_Feedback-App_db');

    // Create connection with mysql db

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // check connection
    if($conn->connect_error){
        die('Connection Failed' . $conn->connect_error);
    }

    // else check connected 
    // echo 'MySQL DB CONNECTED';
?>