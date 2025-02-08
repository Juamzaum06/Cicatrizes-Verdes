<?php
require 'config.php'; // Conexão com o banco de dados
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe o post_id do formulário
    $post_id = $_POST['post_id'];
    $usuario_id = $_SESSION['user_id']; // ID do usuário logado

    try {
        // Verifica se o post existe
        $stmt = $pdo->prepare("SELECT id FROM posts WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            echo json_encode(['success' => false, 'message' => 'Post não encontrado.']);
            exit();
        }

        // Verifica se o usuário já deu like
        $stmt = $pdo->prepare("SELECT id FROM likes WHERE post_id = :post_id AND usuario_id = :usuario_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Remove o like se já existir
            $stmt = $pdo->prepare("DELETE FROM likes WHERE post_id = :post_id AND usuario_id = :usuario_id");
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode(['success' => true, 'message' => 'Like removido!', 'action' => 'unlike']);
        } else {
            // Adiciona um like
            $stmt = $pdo->prepare("INSERT INTO likes (post_id, usuario_id) VALUES (:post_id, :usuario_id)");
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode(['success' => true, 'message' => 'Post curtido!', 'action' => 'like']);
        }

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao processar like: ' . $e->getMessage()]);
    }
}
?>

