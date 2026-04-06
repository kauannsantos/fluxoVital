<?php
// Dados da conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fluxovital";
$port = 3306; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
