<?php

function db_connect() {

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "test_users";

    $conn = mysqli_connect($server, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }

    return $conn;
}

function db_select($query) {
    $conn = db_connect();

    $result = mysqli_query($conn, $query);

    return $result;
    
    mysqli_close($conn);
}

?>