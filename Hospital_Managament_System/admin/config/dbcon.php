<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hastane";

    //creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    //check database connection
    if(!$con){
        header("Location: ../error/dberror.php");
        die("Connection Failed: ". mysqli_connect_error());
    }
    else{
        //echo "Connected Successfully";
    }

?>
























