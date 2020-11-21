<?php
function connect($flag = TRUE)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "doc_hub";

    //Create Connection
    if ($flag) {
        $con = new mysqli($servername, $username, $password, $dbName);
    } else {
        $con = new mysqli($servername, $username, $password);
    }

    //Check Connection
    if ($con->connect_error) {
        die("Connection failed: $con->connect_error");
    }

    //echo"Connected Successfully";

    return $con;
}

date_default_timezone_set('Asia/Dhaka');

$con = connect();
?>