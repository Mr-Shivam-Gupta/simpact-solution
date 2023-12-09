<?php
include "_pdo.php";
// $host = "localhost"; //replace with your hostname
// $username = "growtoken"; //replace with your username
// $password = "Munu$2050"; //replace with your password 
// $db_name = "growtoken"; //replace with your database
// $host = "localhost"; //replace with your hostname
// $username = "root"; //replace with your username
// $password = ""; //replace with your password 
// $db_name = "angular"; //replace with your database
$host = 'localhost'; // Database host (usually 'localhost' or '127.0.0.1')
$db_name = 'api-angular'; // Database name
$username = 'angular'; // Database username
$password = 'ek2^P41b4'; // Database password
PDO_Connect("mysql:host=$host;dbname=$db_name", $username, $password);
?>