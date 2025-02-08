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
    <title>Poluição - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-poluição.css">
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
        <h1>Poluição</h1>
        <p class="description">
            Entenda os diferentes tipos de poluição e seus impactos no meio ambiente e na saúde humana.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>A poluição é definida como a presença de substâncias ou agentes poluentes em quantidades que causam efeitos nocivos ao meio ambiente e à saúde. Estas substâncias podem ser de origem natural, como cinzas e poeiras vulcânicas, ou de origem antropogénica, resultantes de atividades humanas, como a indústria, a agricultura e os transportes. A crescente urbanização e industrialização, combinadas com hábitos de consumo insustentáveis, levaram a um aumento alarmante dos níveis de poluição em todo o mundo.</p>
            <img src="img/Poluição-água.png" alt="Poluição da Água" class="img-fluid mb-4">
            <h6>Imagem Ilustrativa</h6>

            <h3>2. Tipos de poluição</h3>
            <p>A poluição pode ser classificada em diversas categorias, cada uma com características específicas e impactos diferentes. Vejamos os principais tipos:</p>
    
            <h4>2.1. Poluição do ar</h4>
            <p>A poluição do ar é uma das formas de poluição mais visíveis e prejudiciais. Os principais poluentes atmosféricos incluem:</p>
            <ul>
                <li>Dióxido de enxofre (SO2): subproduto dos combustíveis fósseis, que causa irritação do trato respiratório e contribui para a formação de chuva ácida, afetando a vegetação e a biodiversidade.</li>
                <li>Óxidos de nitrogênio (NOx): Emissões de veículos e indústrias, que podem causar problemas respiratórios e agravar condições como a asma. Contribuem também para a formação do ozônio troposférico, poluente prejudicial à saúde.</li>
                <li>Material particulado (MP): Composto por partículas sólidas e líquidas suspensas no ar, essas partículas podem penetrar profundamente nos pulmões, causando doenças cardiovasculares e respiratórias.</li>
                <li>Compostos Orgânicos Voláteis (COV): Produtos químicos emitidos por produtos de limpeza, tintas e combustíveis que afetam o sistema nervoso e podem levar a problemas crônicos de saúde.</li>
            </ul>

            <h4>2.2. Poluição da água</h4>
            <p>A poluição da água é um problema crítico que afeta os recursos hídricos e a vida aquática. Os principais poluentes incluem:</p>
            <ul>
                <li>Efluentes Industriais: Descargas de produtos químicos e resíduos sólidos que poluem rios, lagos e oceanos, resultando na morte de peixes e outros organismos aquáticos. A contaminação com metais pesados como mercúrio e chumbo é particularmente alarmante.</li>
                <li>Agricultura: O uso excessivo de fertilizantes e pesticidas leva à poluição dos recursos hídricos, o que leva à eutrofização, que provoca o crescimento excessivo de algas e a diminuição do oxigénio na água, afetando a fauna aquática.</li>
                <li>Resíduos domésticos: Descarte inadequado de resíduos e produtos químicos que contaminam as fontes de água potável, afetando a saúde das comunidades.</li>
            </ul>

            <h4>2.3. Poluição do solo</h4>
            <p>A poluição do solo é frequentemente ignorada, mas tem um impacto significativo. Os principais poluentes incluem:</p>
            <ul>
                <li>Pesticidas e herbicidas: Substâncias químicas utilizadas na agricultura que podem infiltrar-se no solo e contaminar as águas subterrâneas, causando intoxicação em humanos e animais.</li>
                <li>Resíduos sólidos: Acumulação de resíduos, plásticos e produtos químicos tóxicos que degradam a qualidade da terra, afetando a sua fertilidade e a saúde do ecossistema.</li>
                <li>Metais pesados: elementos como chumbo, mercúrio e cádmio, que se acumulam no solo e na cadeia alimentar, causando toxicidade nos organismos vivos e colocando em risco a saúde pública.</li>
            </ul>

            <h4>2.4. Poluição sonora</h4>
            <p>A poluição sonora é uma forma de poluição que afeta a qualidade de vida nas áreas urbanas. Seus principais impactos incluem:</p>
            <ul>
                <li>Estresse: A exposição contínua a um alto nível de ruído pode levar a problemas psicológicos como ansiedade e depressão.</li>
                <li>Distúrbios do sono: o ruído excessivo pode causar insônia, afetando a saúde física e mental das pessoas.</li>
                <li>Efeitos na audição: A exposição prolongada ao ruído pode causar perda auditiva e zumbido, além de afetar a concentração e o desempenho cognitivo.</li>
            </ul>

            <h3>3. Efeitos na saúde humana</h3>
            <p>Os efeitos da poluição na saúde humana estão amplamente documentados e variam de acordo com o tipo de poluição:</p>
            <ul>
                <li>Doenças respiratórias: A poluição do ar está diretamente ligada a doenças como asma, bronquite e câncer de pulmão. Estudos mostram que pessoas expostas a altos níveis de poluentes atmosféricos experimentam um aumento significativo nas hospitalizações por doenças respiratórias.</li>
                <li>Problemas cardiovasculares: A exposição a poluentes aumenta o risco de ataques cardíacos e derrames porque a poluição do ar pode causar inflamação e estresse oxidativo no corpo.</li>
                <li>Envenenamento: A poluição da água com metais pesados e produtos químicos pode levar a envenenamento crônico, afetando órgãos como o fígado e os rins, e levando a sérios problemas de saúde a longo prazo.</li>
                <li>Efeitos neurológicos: Estudos demonstraram que a exposição a certos poluentes químicos, como o chumbo, está ligada a problemas de desenvolvimento cognitivo, especialmente em crianças, e pode afetar a sua capacidade de aprender e comportar-se.</li>
            </ul>

            <h3>4. Impactos no meio ambiente</h3>
            <p>A poluição não afeta apenas a saúde humana, mas também tem consequências devastadoras para o meio ambiente:</p>
            <ul>
                <li>Destruição de habitat: A poluição da água e da terra afeta o ecossistema, levando à destruição de habitats naturais e à extinção de espécies.</li>
                <li>Alterações climáticas: A poluição do ar, especialmente os gases de efeito estufa, contribui para as mudanças climáticas, resultando em fenômenos climáticos extremos, aumento do nível do mar e perda de biodiversidade.</li>
                <li>Acidificação dos oceanos: A poluição dos oceanos com dióxido de carbono e produtos químicos altera o pH da água, afetando a vida marinha e os recifes de corais, que são essenciais para a biodiversidade marinha.</li>
            </ul>

            <h3>5. Soluções e estratégias de mitigação</h3>
            <p>Para combater a poluição, é essencial adotar uma abordagem integrada, envolvendo ações individuais, políticas públicas e tecnologias inovadoras:</p>
            <ul>
                <li>Educação e conscientização: A promoção de práticas sustentáveis e a conscientização sobre a poluição são fundamentais para reduzir a sua ocorrência.</li>
                <li>Legislação ambiental: A implementação de leis e regulamentos que limitem a emissão de poluentes e incentivem a proteção do meio ambiente é crucial.</li>
                <li>Tecnologias limpas: Investir em tecnologias que reduzam ou eliminem a poluição, como energias renováveis, pode ajudar a mitigar os efeitos nocivos da poluição.</li>
                <li>Reuso e reciclagem: A adoção de práticas de reuso e reciclagem contribui para a redução de resíduos e diminui a poluição no solo e na água.</li>
            </ul>
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
