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
    <title>Resumo sobre Poluição</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-cons-água.css">
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
    

    <header class="text-center py-5" id="text">
        <h1>Conservação da Água</h1>
        <p class="description">
            Veja como a preservação da água é crucial para a vida e para o equilíbrio ambiental.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>A água cobre cerca de 71% da superfície da Terra, mas apenas uma fração deste volume é potável e acessível para consumo humano e uso agrícola. A crescente urbanização, o crescimento populacional e as alterações climáticas estão a exercer pressão sobre os recursos hídricos, conduzindo à escassez de água em muitas partes do mundo. Neste cenário, a conservação da água torna-se uma prioridade para garantir a sobrevivência das gerações presentes e futuras.</p>

            <h3>2. A importância da água</h3>

            <h4>2.1. Suporte de vida</h4>
            <p>A água é essencial para a vida. Todos os seres vivos dependem dele para sobreviver. Nos humanos, a água desempenha funções vitais, como regular a temperatura corporal, facilitar reações químicas e transportar nutrientes e resíduos. A desidratação, por falta de água, pode causar sérios problemas de saúde, incluindo insuficiência renal e até morte.</p>

            <h4>2.2. Equilíbrio do ecossistema</h4>
            <p>A água é um componente fundamental do ecossistema. Apoia a biodiversidade, fornecendo habitats para uma variedade de organismos aquáticos e terrestres. Os ecossistemas aquáticos, como rios, lagos e oceanos, desempenham um papel crucial na regulação do clima, na purificação da água e na reciclagem de nutrientes. A degradação e a escassez da qualidade da água podem causar a extinção de espécies e o colapso de ecossistemas inteiros.</p>

            <h4>2.3. Desenvolvimento econômico</h4>
            <p>A água é um recurso essencial para a agricultura, a indústria e a produção de energia. A agricultura, por exemplo, é um dos maiores consumidores de água e a falta deste recurso pode pôr em perigo a segurança alimentar. A indústria também depende da água para os seus processos de produção e a escassez de água pode ter um impacto negativo no crescimento económico e na criação de emprego.</p>

            <h3>3. Desafios para a conservação da água</h3>
            <p>Apesar da sua importância, a conservação da água enfrenta muitos desafios:</p>

            <h4>3.1. Poluição da água</h4>
            <p>A poluição dos recursos hídricos, devido às atividades industriais, agrícolas e urbanas, põe em risco a qualidade da água potável. Produtos químicos, metais pesados e resíduos orgânicos podem contaminar rios e lençóis freáticos, tornando a água imprópria para consumo e prejudicando a vida aquática.</p>

            <h4>3.2. Mudanças climáticas</h4>
            <p>As alterações climáticas estão a alterar os padrões de precipitação, causando secas em algumas regiões e inundações noutras. Estas alterações afetam a disponibilidade de água e a capacidade de recarga dos aquíferos, agravando assim a escassez de água.</p>

            <h4>3.3. Crescimento populacional</h4>
            <p>O crescimento populacional aumenta a procura de água, tornando a sua gestão mais complexa. A rápida urbanização também leva a um maior consumo de água e à poluição dos recursos hídricos, aumentando assim a pressão sobre os recursos disponíveis.</p>

            <h3>4. Práticas de conservação de água</h3>
            <p>Para garantir a disponibilidade futura de água, é essencial adotar práticas de conservação eficazes:</p>

            <h4>4.1. O uso racional da água</h4>
            <p>É fundamental conscientizar sobre o uso responsável da água. Isso inclui pequenas atividades da vida diária, como fechar a torneira enquanto escova os dentes, tomar banhos mais curtos e consertar vazamentos. Estas medidas podem resultar em poupanças significativas no consumo de água.</p>

            <h4>4.2. Reutilização e reciclagem de água</h4>
            <p>A reutilização de água, especialmente em atividades como irrigação, limpeza e processos industriais, pode reduzir a demanda por água potável. Os sistemas de captação de água da chuva também constituem uma alternativa viável, permitindo que a água seja utilizada para fins não potáveis, como regar jardins e lavar carros.</p>

            <h4>4.3. Proteção dos recursos hídricos</h4>
            <p>A proteção de nascentes, rios e lagos é fundamental para garantir a qualidade e a quantidade de água disponível. Isso pode ser feito por meio da preservação de áreas de vegetação nativa, que funcionam como filtros naturais, e da implementação de políticas públicas voltadas à preservação do meio ambiente.</p>

            <h4>4.4. Educação e conscientização</h4>
            <p>A educação é uma ferramenta poderosa para promover a conservação da água. Campanhas de sensibilização em escolas, comunidades e empresas podem encorajar comportamentos sustentáveis e aumentar a participação pública na conservação dos recursos hídricos.</p>

            <h3>5. Conclusões</h3>
            <p>A conservação da água é essencial para a sobrevivência da vida e para o equilíbrio ambiental. Perante os desafios da poluição, das alterações climáticas e do crescimento populacional, é imperativo agir de forma eficaz para conservar este recurso vital. A adoção de práticas de uso racional, o reúso da água, a proteção dos recursos hídricos e a educação da população são essenciais para garantir a disponibilidade de água para as gerações futuras. Cuidando da água, cuidamos do nosso planeta e garantimos um futuro mais sustentável para todos.</p>

        </section>
        
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Cicatrizes Verdes. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('user-info-button').addEventListener('click', function() {
    const card = document.getElementById('user-info-card');
    if (card.style.display === 'none' || card.style.display === '') {
        card.style.display = 'block';
    } else {
        card.style.display = 'none';
    }
});
    </script>

</body>
</html>
