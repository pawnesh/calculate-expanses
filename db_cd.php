<?php

$db_username = 'pawan';
$db_password = '1234';
$db_database = 'expenditure_mg';

function init_db() {
    global $db_username;
    global $db_password;
    global $db_database;
    $con = mysqli_connect('localhost', $db_username, $db_password, $db_database);
    if (mysqli_connect_errno($con)) {
        echo mysqli_connect_error($con);
        return null;
    }
    return $con;
}

?>