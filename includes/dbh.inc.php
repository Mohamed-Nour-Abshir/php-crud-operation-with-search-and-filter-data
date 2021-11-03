<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "studentManagement";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbname);
if(!$conn){
    die("sql connection failed");
}
