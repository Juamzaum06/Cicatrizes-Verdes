<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postagem = $_POST['postagem'];
    $usuario_id = $_SESSION['user_id'];
    $usuario_nome = $_SESSION['user_nome'];

    try {
        // Preparar e executar a query com PDO
        $stmt = $pdo->prepare("INSERT INTO posts (usuario_id, usuario_nome, conteudo) VALUES (:usuario_id, :usuario_nome, :conteudo)");
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_nome', $usuario_nome, PDO::PARAM_STR);
        $stmt->bindParam(':conteudo', $postagem, PDO::PARAM_STR);
        $stmt->execute();

        // Redirecionar para o fórum
        header("Location: forum.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao criar postagem: " . $e->getMessage();
    }
}
?>
