<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: login.php");
    exit;
}

// Obtém o nome do usuário da sessão
$user_name = $_SESSION['user_nome']; // Nome do usuário
$user_email = $_SESSION['user_email']; // Email do usuário
$user_id = $_SESSION['user_id']; // ID do usuário
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educação Ambiental - Cicatrizes Verdes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Josefin Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/style-educação.css?=1.0">
</head>
<body>

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="inicial.php">Cicatrizes Verdes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <button class="btn btn-outline-success" id="user-info-button">Info do Usuário</button>
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Card com informações do usuário -->
<div id="user-info-card" class="card" style="display: none; position: absolute; right: 20px; top: 70px; z-index: 1000;">
    <div class="card-body">
        <h5 class="card-title">Informações do Usuário</h5>
        <p class="card-text"><strong>Nome:</strong> <?php echo htmlspecialchars($user_name); ?></p>
        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p> <!-- Adicione a variável $user_email -->
        <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($user_id); ?></p> <!-- Adicione a variável $user_id -->
        <form action="logout.php" method="POST">
        <button type="submit" class="btn btn-danger" style="background-color: #e8f5e9;color: #56ab2f;border: none;width: 70px;height: 50px;">Sair</button>
        </form>
    </div>
</div>

    <div class="background">
        <h1 class="text-center mb-5" style="margin-top: 30px;">Educação Ambiental</h1>
        <p class="lead text-center" style="font-size: 20px; margin-top: -45px">Explore nossos conteúdos educativos sobre poluição, mudanças climáticas e como você pode fazer a diferença.</p>
    </div>

    <!-- Educational Section -->
    <section id="educacao" class="py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Poluição.png" class="card-img-top" alt="Poluição">
                        <div class="card-body">
                            <h5 class="card-title">Poluição</h5>
                            <p class="card-text">Entenda os diferentes tipos de poluição e seus impactos no meio ambiente e na saúde humana.</p>
                            <a href="poluição.php" class="btn btn-success" style="margin-top: 79px;">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Mudanças-climáticas.png" class="card-img-top" alt="Mudanças Climáticas">
                        <div class="card-body">
                            <h5 class="card-title">Mudanças Climáticas</h5>
                            <p class="card-text">Saiba mais sobre as causas, efeitos e soluções para as mudanças climáticas globais.</p>
                            <a href="mud-climáticas.php" class="btn btn-success" style="margin-top: 105px;">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Reciclagem.png" class="card-img-top" alt="Reciclagem e Sustentabilidade">
                        <div class="card-body">
                            <h5 class="card-title">Reciclagem e Sustentabilidade</h5>
                            <p class="card-text">Descubra como a reciclagem e práticas sustentáveis podem reduzir o impacto ambiental.</p>
                            <a href="reciclagem.php" class="btn btn-success" style="margin-top: 45px;">Ler mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Desmatamento.png" class="card-img-top" alt="Desmatamento">
                        <div class="card-body">
                            <h5 class="card-title">Desmatamento</h5>
                            <p class="card-text">Compreenda os efeitos devastadores do desmatamento e como podemos combatê-lo.</p>
                            <a href="desmatamento.php" class="btn btn-success" style="margin-top: 105px;">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Energias-renováveis.png" class="card-img-top" alt="Energias Renováveis">
                        <div class="card-body">
                            <h5 class="card-title">Energias Renováveis</h5>
                            <p class="card-text">Aprenda sobre a importância das fontes de energia renovável para um futuro sustentável.</p>
                            <a href="renovável.php" class="btn btn-success" style="margin-top: 105px;">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="img/Conservação-água.png" class="card-img-top" alt="Conservação da Água">
                        <div class="card-body">
                            <h5 class="card-title">Conservação da Água</h5>
                            <p class="card-text">Veja como a preservação da água é crucial para a vida e para o equilíbrio ambiental.</p>
                            <a href="cons-água.php" class="btn btn-success" style="margin-top: 105px;">Ler mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <p>&copy; 2024 Cicatrizes Verdes. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script-educação.js"></script>
</body>
</html>
