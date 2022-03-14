<?php
// Attempt MySQL server connection.
$link = mysqli_connect("localhost", "root", "password");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE assignment.users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, 
	email VARCHAR(50) NOT NULL UNIQUE,
	username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
	address VARCHAR(511) NOT NULL,
	phoneno INT(10) NOT NULL,
	storage INT(1) NOT NULL DEFAULT '3',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($link, $sql)){
    echo "TABLE created successfully";
} else{
    echo "ERROR: Could not to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>