<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "myDB";

$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


$sqlCommand = "CREATE TABLE products(
	sku varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	price int(11) unsigned NOT NULL,
	productType varchar(255) NOT NULL,
    size int(11) unsigned,
    height int(11) unsigned,
    width int(11) unsigned,
    length int(11) unsigned,
    weight int(11) unsigned
)";


if ($con->query($sqlCommand) === TRUE) {
  echo "products table has been created successfully";
} else {
  echo "Error creating table: " . $con->error;
}

$con->close();
?>