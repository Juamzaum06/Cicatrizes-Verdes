<?php
$host = 'localhost'; // ou o endereço do seu servidor
$db   = 'cicatrizes_verdes'; // substitua pelo nome do seu banco de dados
$user = 'joao'; // substitua pelo seu usuário do banco de dados
$pass = '123456789'; // substitua pela sua senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
