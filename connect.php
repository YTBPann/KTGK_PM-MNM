<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Test1";
$port = 3307;


$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

?>
