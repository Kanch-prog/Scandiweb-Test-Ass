<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "myDB";


$con = mysqli_connect("$db_host", "$db_username", "$db_pass");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Create database

// If database is not exist create one
if (!mysqli_select_db($con,$db_name)){
    $sql = "CREATE DATABASE ".$db_name;
    if ($con->query($sql) === TRUE) {
        echo "Database created successfully";
    }else {
        echo "Error creating database: " . $con->error;
    }
} 

      $retval = mysqli_select_db( $con, 'myDB' );

?>