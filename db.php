<?php
// This is the database class. This is where it will be connected to the database. I use my own
// MySQL database (phpMyAdmin). So you may modify or edit the code based on the database you are
// using or if you are using the same db and it has password or different hostname, db name and 
// username. 

$host = "localhost";
$dbname = "tokoshop";
$username = "root";
$password = "";

$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>