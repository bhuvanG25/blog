<?php   
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "travelBlog";

    $conn = new mysqli($host,$username,$password,$dbName);
    if($conn->connect_error)
    {
        echo "Connection Failed".$conn->connect_error;
    }
?>