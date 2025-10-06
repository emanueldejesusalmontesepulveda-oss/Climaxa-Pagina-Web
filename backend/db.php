<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "climaxa";

try {
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
    
    // Configurar charset
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    error_log("Error de base de datos: " . $e->getMessage());
    die("Error del sistema. Por favor, intente más tarde.");
}
?>