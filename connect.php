<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "todo-list";


$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$connection) {
    die("somting wrong");
} 
// else {
//     echo "Connected";
// }
