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
    <title>Mudanças Climáticas - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-mud-climáticas.css">
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
        <h1>Mudanças Climáticas</h1>
        <p class="description">
            Saiba mais sobre as causas, efeitos e soluções para as mudanças climáticas globais.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>As alterações climáticas referem-se às alterações a longo prazo na temperatura e nos padrões climáticos da Terra, causadas principalmente por um aumento da concentração de gases com efeito de estufa (GEE) na atmosfera. Desde a revolução industrial, a atividade humana acelerou significativamente o aquecimento global, o que desestabiliza os sistemas climáticos naturais. As consequências já são visíveis: degelo dos glaciares, subida do nível do mar, fenómenos climáticos extremos e perda de biodiversidade. Este artigo discute as causas das mudanças climáticas, seus efeitos gerais e possíveis soluções que podem ser implementadas para reduzir os impactos e prevenir uma crise ambiental ainda mais grave.</p>
        
            <h3>2. Causas das mudanças climáticas</h3>
            <p>As alterações climáticas são causadas principalmente pelas atividades humanas que libertam grandes quantidades de gases com efeito de estufa na atmosfera. Aqui estão os principais motivos:</p>
        
            <h4>2.1. Emissões de gases de efeito estufa (GEE)</h4>
            <p>Os gases de efeito estufa retêm o calor na atmosfera, contribuindo para o aquecimento global. Os principais gases de efeito estufa incluem:</p>
            <ul>
                <li>Dióxido de carbono (CO₂): Responsável por cerca de 76% das emissões globais de GEE, o CO₂ é emitido principalmente pela combustão de combustíveis fósseis (carvão, petróleo e gás natural) para geração de eletricidade, transportes e indústrias. A desflorestação também liberta uma grande quantidade de CO₂, uma vez que as florestas absorvem este gás através da fotossíntese.</li>
                <li>Metano (CH₄): Embora menos abundante que o CO₂, o metano tem um valor calorífico muito mais poderoso. Está dispensado de atividades como pecuária, produção de arroz e decomposição de resíduos em aterros sanitários.</li>
                <li>Óxido nitroso (N₂O): Este gás é emitido principalmente por atividades agrícolas, como o uso de fertilizantes nitrogenados, e também por processos industriais.</li>
                <li>Gases fluorados: Utilizados em refrigerantes, aerossóis e processos industriais, estes gases têm um potencial de aquecimento muito elevado, embora as suas concentrações sejam inferiores às de outros GEE.</li>
            </ul>
        
            <h4>2.2. Desmatamento</h4>
            <p>As florestas desempenham um papel crucial na absorção de CO₂ da atmosfera. O desmatamento, especialmente em áreas tropicais como a Amazônia, reduz a capacidade da Terra de absorver carbono, aumentando assim a concentração de CO₂ na atmosfera. Além disso, as árvores queimadas durante o desmatamento liberam grandes quantidades de CO₂.</p>
        
            <h4>2.3. Agricultura e pecuária</h4>
            <p>A agricultura intensiva e a pecuária são fontes importantes de GEE, especialmente metano e óxido nitroso. A fermentação entérica em ruminantes (como bovinos) libera grandes quantidades de metano, enquanto a decomposição de resíduos agrícolas e o uso de fertilizantes nitrogenados aumentam as emissões de N₂O.</p>
        
            <h4>2.4. Combustão de combustíveis fósseis</h4>
            <p>A queima de carvão, petróleo e gás natural é a principal fonte de CO₂ e de outros poluentes que contribuem para o aquecimento global. O setor energético, os transportes e as indústrias são os principais responsáveis pelo lançamento destes poluentes na atmosfera.</p>
        
            <h3>3. Efeitos das alterações climáticas</h3>
            <p>As alterações climáticas já estão a ter um impacto profundo nos ecossistemas, nas economias e nas sociedades em todo o mundo. Entre os principais efeitos distinguimos:</p>
        
            <h4>3.1. Aumento da temperatura global</h4>
            <p>A temperatura média global aumentou cerca de 1,2°C desde o final do século XIX, tendo a maior parte deste aquecimento ocorrido nas últimas décadas. Mesmo este aumento aparentemente pequeno já está a causar alterações climáticas significativas, tais como ondas de calor mais intensas e frequentes.</p>
        
            <h4>3.2. Derretimento de geleiras e aumento do nível do mar</h4>
            <p>O aquecimento global está a acelerar o derretimento dos glaciares e das camadas de gelo na Gronelândia, na Antártida e noutras regiões. Como resultado, o nível do mar está a subir, ameaçando as comunidades costeiras e os ecossistemas marinhos. Estima-se que, até 2100, o nível do mar poderá subir entre 26 e 77 centímetros, dependendo dos esforços para reduzir as emissões de GEE.</p>
        
            <h4>3.3. Eventos climáticos extremos</h4>
            <p>As alterações climáticas aumentaram a frequência e a intensidade de fenómenos meteorológicos extremos, como furacões, secas, inundações e incêndios florestais. Estes acontecimentos têm impactos devastadores nas comunidades, levando a perdas económicas, à destruição de infra-estruturas e ao deslocamento forçado de milhões de pessoas.</p>
        
            <h4>3.4. Acidificação dos oceanos</h4>
            <p>A crescente concentração de CO₂ na atmosfera não só aquece o planeta, mas também provoca a acidificação dos oceanos. Cerca de 30% do CO₂ emitido pela atividade humana é absorvido pelos oceanos, o que leva à diminuição do pH da água. Este fenómeno prejudica a vida marinha, especialmente os corais e os moluscos, e ameaça a biodiversidade do oceano.</p>
        
            <h4>3.5. Perda de biodiversidade</h4>
            <p>As alterações climáticas estão a forçar muitas espécies a migrar para novos habitats ou a adaptar-se a condições desfavoráveis. No entanto, muitas espécies não conseguem acompanhar o ritmo das mudanças e correm o risco de extinção. A perda de biodiversidade tem um impacto direto nos ecossistemas, que prestam serviços essenciais à humanidade, como a polinização, a purificação da água e a regulação climática.</p>
        
            <h4>3.6. Efeitos na saúde humana</h4>
            <p>As alterações climáticas também têm implicações diretas para a saúde humana. Ondas de calor prolongadas, aumento de doenças transmitidas por vetores (como a malária e a dengue) e a escassez de alimentos e água devido a secas e inundações são apenas alguns dos problemas de saúde climáticos emergentes em muitas regiões do mundo.</p>
        
            <h3>4. Soluções para as alterações climáticas</h3>
            <p>A mitigação das alterações climáticas exige uma transformação profunda em todos os setores da sociedade, com foco na redução das emissões de GEE e na adaptação às novas condições climáticas. As principais soluções incluem:</p>
        
            <h4>4.1. Transição para energias renováveis</h4>
            <p>A substituição dos combustíveis fósseis por fontes de energia limpas e renováveis, como a solar, a eólica e a hídrica, é essencial para reduzir as emissões de CO₂. A eletrificação de setores como os transportes e a indústria, combinada com a utilização de tecnologias de armazenamento de energia, pode acelerar a transição para uma economia de baixo carbono.</p>
        
            <h4>4.2. Reflorestamento e conservação florestal</h4>
            <p>O reflorestamento e a conservação das florestas tropicais são essenciais para restaurar a capacidade da Terra de absorver CO₂. Os programas de reflorestação também podem criar empregos e melhorar a qualidade de vida das comunidades locais, protegendo ao mesmo tempo a biodiversidade.</p>
        
            <h4>4.3. Agricultura sustentável</h4>
            <p>Práticas agrícolas mais sustentáveis, como a gestão integrada de pragas, a rotação de culturas e a agroecologia, podem reduzir as emissões de GEE, melhorar a qualidade do solo e aumentar a resiliência das culturas às alterações climáticas. A pecuária intensiva também pode ser repensada, buscando práticas que minimizem as emissões de metano.</p>
        
            <h4>4.4. Eficiência energética</h4>
            <p>A melhoria da eficiência energética nos edifícios, nos transportes e na indústria é uma das formas mais eficazes de reduzir as emissões de GEE. Tecnologias como iluminação LED, isolamento térmico e veículos elétricos podem reduzir significativamente o consumo de energia e os custos associados.</p>
            
            <h3>5. Conclusão</h3>
    <p>As alterações climáticas são um dos maiores desafios globais que exigem uma ação coletiva imediata e eficaz. Através da redução das emissões de gases de efeito estufa, da transição para fontes de energia renováveis e da adaptação a um ambiente em constante mudança, é possível mitigar os piores impactos desse fenômeno. A preservação do meio ambiente e a implementação de práticas sustentáveis são cruciais para garantir a saúde do planeta para as gerações futuras.</p>
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
