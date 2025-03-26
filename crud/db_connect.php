<?php 

$hostName = "localhost"; # 127.0.0.1
$dbName = "crud";
$userName = "root";
$password = "";

// $conn = mysqli_connect("localhost", "root", "", "crud");
// the order is important!

// $conn = mysqli_connect($hostName, $userName, $password, $dbName);

// written as an object
// the same!

$conn = new mysqli($hostName, $userName, $password, $dbName);