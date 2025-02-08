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
    <title>Cicatrizes Verdes - Índices Ambientais</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Josefin Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/style-inicial.css?v=1.0">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand">Cicatrizes Verdes</a>
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
        <button type="submit" class="btn btn-danger" style="background-color: #e8f5e9;color: #56ab2f;border: none;width: 74px;height: 50px;">Sair</button>
        </form>
    </div>
</div>

    
    <!-- Section for Cards: About, Educational Content, Contact -->
    <section id="company-info" class="py-5">
        <div class="container text-center">
            <div class="row g-4">
                <!-- Card 1: About the Company -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-building fa-3x mb-3"></i>
                            <h4 class="card-title" style="margin-top: -15px">Calculadora de Emissão</h4>
                            <p class="card-text">Veja a quantidade de carbono que você emite na atmosfera.</p>
                            <a href="calculadora.php" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Educational Content -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-book-open fa-3x mb-3"></i>
                            <h4 class="card-title">Conteúdos Educativos</h4>
                            <p class="card-text" style="margin-top: 15px;">Acesse nossa área de educação com artigos, vídeos e tutoriais sobre poluição e mudanças climáticas.</p>
                            <a href="educação.php" class="btn btn-success">Ver Conteúdos</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Contact the Company -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-envelope fa-3x mb-3"></i>
                            <h4 class="card-title" style="margin-top: -15px;">Fórum da Comunidade</h4>
                            <p class="card-text">Acesse o fórum da comunidade para buscar por mais conteúdos propostos por outras pessoas.</p>
                            <a href="forum.php" class="btn btn-warning">Acessar Fórum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Notícias -->
    <section id="noticias" class="py-5">
        <div class="container text-center">
            <h2>Últimas Notícias</h2>
            <p>Veja as últimas novidades sobre o meio ambiente</p>
            <div class="row" id="news-container">
                <!-- As cartas de notícias serão injetadas aqui pelo JavaScript -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Cicatrizes Verdes. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/script-inicial.js"></script>
</body>
</html>
