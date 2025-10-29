<?php
$host = "localhost";
$port = 3306;
$user = "root";
$pass = "admin";
$db   = "opovo";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
