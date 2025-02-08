<?php
require 'config.php'; // Inclui a conexão com o banco de dados
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe o conteúdo do comentário e o ID do post
    $comentario = $_POST['comentario'];
    $post_id = $_POST['post_id'];
    $usuario_id = $_SESSION['user_id']; // Obtém o ID do usuário logado
    $usuario_nome = $_SESSION['user_nome']; // Obtém o nome do usuário logado

    try {
        // Verifica se o post existe
        $stmt = $pdo->prepare("SELECT id FROM posts WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            die("Erro: post não encontrado.");
        }

        // Insere o comentário na tabela 'comentarios'
        $stmt = $pdo->prepare("INSERT INTO comentarios (post_id, usuario_id, usuario_nome, conteudo) VALUES (:post_id, :usuario_id, :usuario_nome, :conteudo)");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_nome', $usuario_nome, PDO::PARAM_STR);
        $stmt->bindParam(':conteudo', $comentario, PDO::PARAM_STR);
        $stmt->execute();

        // Redireciona de volta para a página do fórum
        header("Location: forum.php");
        exit();

    } catch (PDOException $e) {
        // Exibe erro caso haja uma falha na execução da consulta
        die("Erro ao processar comentário: " . $e->getMessage());
    }
}
?>
