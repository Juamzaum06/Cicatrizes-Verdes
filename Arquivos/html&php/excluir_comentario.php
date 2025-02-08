<?php
session_start();
require_once 'config.php';  // Inclua seu arquivo de configuração e conexão com o banco

if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $comentarioId = $_GET['id'];
    $usuarioId = $_SESSION['user_id'];

    // Verificar se o comentário pertence ao usuário
    $stmt = $pdo->prepare("SELECT usuario_id FROM comentarios WHERE id = :id");
    $stmt->execute(['id' => $comentarioId]);
    $comentario = $stmt->fetch();

    if ($comentario && $comentario['usuario_id'] == $usuarioId) {
        // Excluir comentário
        $deleteStmt = $pdo->prepare("DELETE FROM comentarios WHERE id = :id");
        $deleteStmt->execute(['id' => $comentarioId]);

        // Redirecionar de volta para a página do post
        header("Location: forum.php?id=" . $_GET['post_id']);
        exit;
    } else {
        echo "Você não tem permissão para excluir este comentário.";
    }
} else {
    echo "Comentário não encontrado ou usuário não autenticado.";
}
?>
