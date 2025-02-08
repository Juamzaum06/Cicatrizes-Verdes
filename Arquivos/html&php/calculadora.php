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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Emissões de Carbono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-calculadora.css?v=1.0">
</head>

<header>
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
</header>

<body>
    <div class="container-main">
        <h1 class="text-center mb-4"><i class="fas fa-leaf icon"></i> Calculadora de Emissões de Carbono</h1>
        <div class="progress mt-3">
            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        
        <form id="carbonForm">
            <!-- Perguntas serão exibidas uma por vez -->
            <div id="questions-container">
                <div id="question1" class="question">
                    <label for="transport" class="form-label">Qual o principal meio de transporte que você utiliza no dia a dia?</label>
                    <select class="form-select" id="transport" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="carro">Carro</option>
                        <option value="onibus">Ônibus</option>
                        <option value="metro">Metrô</option>
                        <option value="bicicleta">Bicicleta</option>
                        <option value="ape">A pé</option>
                    </select>
                </div>

                <div id="question2" class="question d-none">
                    <label for="distance" class="form-label">Qual a distância média que você percorre diariamente com o meio de transporte citado anteriormente(em km)?</label>
                    <input type="number" class="form-control" id="distance" min="0" placeholder="Distância em km" required>
                </div>

                <div id="question3" class="question d-none">
                    <label for="flights" class="form-label">Com que frequência você utiliza transporte aéreo por ano?</label>
                    <input type="number" class="form-control" id="flights" min="0" placeholder="Número de voos por ano" required>
                </div>

                <div id="question4" class="question d-none">
                    <label for="energy" class="form-label">Qual o valor aproximado da sua conta de energia elétrica mensal em casa (em R$)?</label>
                    <input type="number" class="form-control" id="energy" min="0" placeholder="Valor em R$" required>
                </div>

                <div id="question5" class="question d-none">
                    <label for="people" class="form-label">Quantas pessoas moram na sua casa (contando com você)?</label>
                    <input type="number" class="form-control" id="people" min="1" placeholder="Número de pessoas" required>
                </div>

                <div id="question6" class="question d-none">
                    <label for="highDemand" class="form-label">Você utiliza algum equipamento eletrônico com alta demanda energética, como ar condicionado ou aquecedor?</label>
                    <select class="form-select" id="highDemand" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="não">Não</option>
                    </select>
                </div>

                <div id="question7" class="question d-none">
                    <label for="solar" class="form-label">Você possui placas solares ou outras fontes de energia renovável em sua casa?</label>
                    <select class="form-select" id="solar" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="não">Não</option>
                    </select>
                </div>

                <div id="question8" class="question d-none">
                    <label for="meatConsumption" class="form-label">Qual a frequência com que você consome carne vermelha, frango, peixe e produtos lácteos por semana?</label>
                    <input type="number" class="form-control" id="meatConsumption" min="0" placeholder="Número de vezes por semana. Máx. 7" required>
                </div>

                <div id="question9" class="question d-none">
                    <label for="organic" class="form-label">Você costuma comprar alimentos orgânicos ou produzidos localmente?</label>
                    <select class="form-select" id="organic" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="não">Não</option>
                    </select>
                </div>

                <div id="question10" class="question d-none">
                    <label for="clothes" class="form-label">Com que frequência você compra roupas novas mensalmente? (Número de Peças)</label>
                    <p>* Se você não compra roupas mensalmente, coloque uma estimativa trimestral</p>
                    <input type="number" class="form-control" id="clothes" min="0" placeholder="Número de peças por mês" required>
                </div>

                <div id="question11" class="question d-none">
                    <label for="carbonHabbit" class="form-label">Você possui algum hábito que gere emissões de carbono, como fumar ou queimar fogueira?</label>
                    <select class="form-select" id="carbonHabbit" required>
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="não">Não</option>
                    </select>
                </div>

                <!-- Botão para avançar perguntas -->
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-custom" id="nextBtn">Próxima</button>
                </div>
            </div>

        </form>

        <!-- Resultado -->
        <div id="result" class="result-card d-none">
            <h2 style="color: #56ab2f;">Resultados</h2>
            <p id="dailyEmission">Emissões diárias: </p>
            <p id="monthlyEmission">Emissões mensais: </p>
            <p id="yearlyEmission">Emissões anuais: </p>
            <p id="status" class="result-status"></p>
            <p>* Esses números podem variar de acordo com o local onde você mora e com o seu estilo de vida.</p>
        </div>
    </div>


    <script src="js/script-calculadora.js"></script>

</body>
</html>
