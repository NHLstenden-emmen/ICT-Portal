<?php
$servername = "localhost"; //Hostname server
$username = "root"; //Username database
$password = ""; //Password database
$dbname = "project"; //Database name

//Create new connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check the connection
if ($conn->connect_error) {
  die("Connection error: " . $conn->connect_error);
}
?>