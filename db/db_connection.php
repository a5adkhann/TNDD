<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "tnddept";

$connection = mysqli_connect($host, $username, $password, $database);
?>