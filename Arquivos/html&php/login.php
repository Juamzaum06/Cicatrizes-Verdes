<?php
session_start();
include 'config.php'; // Inclui a configuração do banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara e executa a consulta para buscar o usuário
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        header("Location: inicial.php"); // Redireciona para a página inicial
        exit;
    } else {
        $erro = "Email ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cicatrizes Verdes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-login.css">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-5 animate-fade-in" style="max-width: 500px;">
            <h1 class="text-center mb-4 display-5">Cicatrizes Verdes</h1>
            <p class="text-center text-muted">Bem-vindo de volta! Faça login para continuar explorando soluções sustentáveis.</p>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erro; ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <div class="mb-3 text-end">
                    <a href="#" class="text-muted">Esqueci minha senha</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                <div class="text-center">
                    <button type="button" class="btn btn-outline-dark w-100 mb-3" id="google-sign-in">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google logo" class="me-2">
                        Entrar com Google
                    </button>
                </div>
                <div class="text-center">
                    <p>Não tem uma conta? <a href="registrar.php" class="text-decoration-underline">Crie uma</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="js/script-login.js"></script>
</body>
</html>
