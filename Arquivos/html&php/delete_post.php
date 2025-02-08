<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php'; // Inclua a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
    $post_id = (int) $_POST['post_id'];
    $user_name = $_SESSION['user_nome'];

    try {
        // Verifica se o post pertence ao usuário logado
        $stmt = $pdo->prepare("SELECT usuario_nome FROM posts WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post && $post['usuario_nome'] === $user_name) {
            // Exclui o post
            $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :post_id");
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: forum.php?message=Postagem excluída com sucesso.");
            exit;
        } else {
            header("Location: forum.php?error=Você não tem permissão para excluir esta postagem.");
            exit;
        }
    } catch (PDOException $e) {
        die("Erro ao excluir postagem: " . $e->getMessage());
    }
}

header("Location: forum.php");
exit;
