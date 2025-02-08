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
    <title>Desmatamento - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-desmatamento.css">
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
        <h1>Desmatamento</h1>
        <p class="description">
            Compreenda os efeitos devastadores do desmatamento e como podemos combatê-lo.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>As florestas cobrem cerca de 31% da superfície terrestre e desempenham um papel vital na regulação do clima, fornecendo oxigénio e preservando a biodiversidade. No entanto, estas áreas vitais estão a ser rapidamente destruídas pela desflorestação, uma actividade impulsionada em grande parte por interesses económicos imediatos. A desflorestação não afecta apenas o equilíbrio ambiental, mas também põe em perigo a saúde humana e põe em perigo o futuro do planeta. Este artigo explora os efeitos devastadores da desflorestação, detalha as suas causas profundas e discute soluções práticas para mitigar e potencialmente reverter esta destruição contínua.</p>

            <h3>2. Causas do desmatamento</h3>
            <p>O desmatamento ocorre por vários motivos, principalmente relacionados ao uso de recursos e à expansão da atividade humana. Entre as principais causas estão:</p>

            <h4>2.1. Extensão agrícola</h4>
            <p>A agricultura, especialmente a pecuária, é uma das principais causas do desmatamento. As florestas foram derrubadas para dar lugar a pastagens e plantações de monoculturas, como soja e óleo de palma, que são utilizadas para alimentação animal e produção de biocombustíveis.</p>

            <h4>2.2. Gravação</h4>
            <p>A extração de madeira para produção de produtos de construção, móveis e papel é uma das causas diretas do desmatamento. A exploração madeireira ilegal também agrava a situação, pois a falta de regulamentação contribui para a destruição de grandes áreas de floresta.</p>

            <h4>2.3. Expansão urbana e infraestrutura</h4>
            <p>O crescimento das áreas urbanas e a construção de estradas, barragens e outras infra-estruturas também conduzem à desflorestação. Estas atividades destroem o habitat natural das espécies e modificam significativamente a estrutura do ecossistema.</p>

            <h4>2.4. Mineração</h4>
            <p>A mineração, especialmente em regiões ricas em recursos naturais como a Amazônia, é uma causa significativa do desmatamento. A abertura de minas e a construção de infra-estruturas para o transporte de minerais levam à perda de grandes áreas florestais.</p>

            <h3>3. Os efeitos devastadores do desmatamento</h3>
            <p>A desflorestação tem consequências profundas e devastadoras, tanto no ambiente como na saúde e no bem-estar da população humana. Aqui estão os principais impactos desta prática destrutiva:</p>

            <h4>3.1. Perda de biodiversidade</h4>
            <p>As florestas tropicais, em particular, abrigam a maior parte da biodiversidade terrestre do planeta. Quando estas florestas são destruídas, milhares de espécies de plantas e animais perdem o seu habitat, muitas vezes levando à extinção das espécies antes de serem descobertas. A perda de biodiversidade afecta não só o ecossistema local, mas também a estabilidade dos sistemas globais, uma vez que cada espécie desempenha um papel no equilíbrio ambiental.</p>

            <h4>3.2. Aumento das emissões de gases com efeito de estufa</h4>
            <p>As florestas são sumidouros de carbono, o que significa que absorvem dióxido de carbono (CO2) da atmosfera. Quando as árvores são cortadas ou queimadas, o carbono armazenado é libertado no ambiente, aumentando a concentração de gases com efeito de estufa e agravando o aquecimento global. A desflorestação é responsável por cerca de 10% das emissões globais de carbono, contribuindo significativamente para as alterações climáticas.</p>

            <h4>3.3. Degradação da terra e desertificação</h4>
            <p>Sem árvores para proteger o solo da erosão, as áreas desmatadas sofrem degradação acelerada. A terra torna-se menos fértil, perde a capacidade de reter água e pode até transformar-se em terra seca, num processo denominado desertificação. Isto não só afecta a vegetação local, mas também reduz a produtividade agrícola, levando a crises alimentares em regiões vulneráveis.</p>

            <h4>3.4. Mudança no ciclo da água</h4>
            <p>As árvores desempenham um papel fundamental no ciclo da água, ajudando a regular a quantidade de umidade na atmosfera e proporcionando precipitação. O desmatamento afeta esse equilíbrio, levando a mudanças nos padrões de precipitação. Isto pode causar secas graves em algumas áreas e inundações noutras, prejudicando a agricultura e a disponibilidade de água potável.</p>

            <h4>3.5. Efeitos na saúde humana</h4>
            <p>O desmatamento tem consequências diretas na saúde humana. Além de aumentar o risco de desastres naturais, como deslizamentos de terras e inundações, o desmatamento expõe as populações locais a novas doenças. A perda de biodiversidade pode desestabilizar o ecossistema, favorecendo a propagação de patógenos zoonóticos (doenças transmitidas de animais para humanos), como se viu em epidemias recentes.</p>

            <h3>4. Como combater o desmatamento</h3>
            <p>A luta contra o desmatamento requer esforços coordenados entre governos, empresas e sociedade civil. Aqui estão algumas das principais estratégias para reduzir e eventualmente parar o desmatamento global:</p>

            <h4>4.1. Políticas de conservação e proteção florestal</h4>
            <p>Os governos e as organizações internacionais têm um papel crucial na implementação de políticas de protecção florestal. A criação de áreas de conservação e a monitorização rigorosa contra a exploração ilegal de recursos são medidas importantes. Além disso, o reforço dos acordos internacionais, como o Acordo de Paris, pode ajudar a conservar as florestas do mundo.</p>

            <h4>4.2. Agricultura sustentável</h4>
            <p>A promoção de práticas agrícolas sustentáveis ​​é essencial para reduzir a pressão sobre as florestas. A agrossilvicultura, que integra a agricultura com a conservação das árvores, e a rotação de culturas são exemplos de métodos para minimizar a necessidade de desmatamento, garantindo assim a produtividade agrícola sem destruir o ecossistema.</p>

            <h4>4.3. Manejo florestal sustentável</h4>
            <p>A exploração madeireira, quando feita de forma sustentável, pode minimizar os impactos negativos nas florestas. O manejo florestal sustentável inclui extração seletiva de madeira, replantio e monitoramento contínuo de áreas desmatadas. Certificações como o FSC (Forest Stewardship Council) ajudam a garantir que os produtos de madeira sejam responsáveis.</p>

            <h4>4.4. Reflorestamento e recuperação de áreas degradadas</h4>
            <p>O reflorestamento é uma das formas mais eficazes de combater o desmatamento. A plantação de árvores em áreas desmatadas não só restaura o ecossistema, mas também ajuda a sequestrar carbono da atmosfera, mitigando os efeitos das alterações climáticas. Além disso, a recuperação de áreas degradadas, como solos erodidos, pode restaurar o ecossistema.</p>

            <h4>4.5. Conscientização e educação ambiental</h4>
            <p>A educação ambiental é essencial para reduzir o desmatamento no longo prazo. Ao aumentar a sensibilização para a importância das florestas e para os impactos devastadores da sua destruição, podemos encorajar mudanças no comportamento dos consumidores e promover o apoio a práticas sustentáveis. A sociedade como um todo deve compreender que a conservação das florestas não é apenas uma questão ambiental, mas também uma questão de sobrevivência global.</p>

            <h3>5. Conclusões</h3>
            <p>O desmatamento é uma das maiores ameaças ao meio ambiente e ao bem-estar humano. As suas consequências, incluindo a perda de biodiversidade, o agravamento das alterações climáticas e a degradação dos solos, são devastadoras e afetam diretamente a qualidade de vida no planeta. Contudo, com políticas eficazes, práticas agrícolas sustentáveis, gestão florestal responsável e um compromisso global com a conservação, é possível mudar este cenário.</p>

            <p>A conservação das florestas é uma responsabilidade partilhada. Agindo agora, podemos proteger os recursos naturais, garantir ecossistemas saudáveis ​​e garantir que as gerações futuras herdam um planeta capaz de sustentar a vida em toda a sua diversidade.</p>

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
