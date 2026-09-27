<?php
$host = "localhost"; // Host do banco de dados
$user = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "cadernodanonna"; // Nome do banco de dados

// Criar conexão
$dsn = "mysql:host=$host;port=3307;dbname=$database;charset=utf8";
try{
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    die("Erro na conexão:". $e->getMessage());
}
?>