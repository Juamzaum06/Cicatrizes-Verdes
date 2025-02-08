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
    <title>Reciclagem - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-reciclagem.css">
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
        <h1>Reciclagem e Sustentabilidade</h1>
        <p class="description">
            Descubra como a reciclagem e práticas sustentáveis podem reduzir o impacto ambiental.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>Nos últimos séculos, o crescimento da produção industrial, o crescimento populacional e o consumo desenfreado geraram uma série de impactos negativos ao meio ambiente, como o esgotamento dos recursos naturais e a produção excessiva de resíduos. Neste contexto, a reciclagem parece ser uma das práticas mais eficazes para reduzir o desperdício e promover a sustentabilidade. A sustentabilidade refere-se basicamente à utilização responsável dos recursos naturais de forma a garantir que as gerações futuras também possam beneficiar deles. A reciclagem está intimamente relacionada a este conceito, pois minimiza a extração de novos recursos, economiza energia e reduz a quantidade de resíduos que vão para aterros ou poluem o ecossistema. Este artigo examina como a reciclagem e outras práticas sustentáveis ​​podem ajudar a reverter o curso da degradação ambiental.</p>

            <h3>2. O papel da reciclagem na redução do impacto ambiental</h3>
            <p>A reciclagem envolve a coleta, triagem e processamento de materiais que de outra forma seriam descartados como lixo, transformando-os em novos produtos ou matérias-primas. Ao dar nova vida a itens que de outra forma seriam descartados, a reciclagem oferece benefícios ambientais significativos.</p>

            <h4>2.1. Reduzir a extração de recursos naturais</h4>
            <p>Quando reciclamos papel, plástico, vidro e metais, reduzimos a necessidade de extrair novos materiais da natureza. Por exemplo, a reciclagem de papel evita o corte de árvores, preservando assim as florestas e os habitats naturais. A reciclagem de metais, como alumínio e aço, reduz a necessidade de mineração, atividade que destrói ecossistemas e consome grandes quantidades de energia.</p>

            <h4>2.2. Economia de energia</h4>
            <p>Reciclar materiais, em vez de fabricá-los do zero, consome menos energia. Por exemplo, a produção de alumínio a partir de materiais reciclados consome 95% menos energia do que a produção a partir da bauxita, matéria-prima virgem. Da mesma forma, a reciclagem de vidro, papel e plástico também requer menos energia do que a produção de novos produtos a partir de matérias-primas naturais.</p>

            <h4>2.3. Redução das emissões de gases com efeito de estufa</h4>
            <p>A produção industrial tradicional é uma importante fonte de emissões de gases com efeito de estufa (GEE), que contribuem para o aquecimento global e as alterações climáticas. A reciclagem, ao poupar energia e reduzir a extração de recursos, ajuda a reduzir estas emissões. Além disso, ao reduzir a quantidade de resíduos enviados para aterros, a reciclagem evita a decomposição anaeróbica de materiais orgânicos, que libera metano, um GEE muito mais potente que o dióxido de carbono.</p>

            <h4>2.4. Redução do volume de resíduos em aterros</h4>
            <p>Os aterros sanitários são uma das principais fontes de poluição ambiental, liberando poluentes no solo, na água e na atmosfera. A reciclagem reduz significativamente a quantidade de resíduos sólidos enviados para esses aterros, reduzindo a pressão sobre áreas que se esgotam rapidamente e prolongando a sua vida útil. Além disso, menos resíduos em aterros significa menos escoamento e gases tóxicos que podem contaminar as águas subterrâneas e o ar.</p>

            <h3>3. Práticas sustentáveis ​​além da reciclagem</h3>
            <p>Embora a reciclagem seja essencial para mitigar o impacto ambiental, outras práticas sustentáveis ​​complementares também desempenham um papel fundamental no caminho para a sustentabilidade.</p>

            <h4>3.1. Redução do consumo e reutilização</h4>
            <p>Reduzir o consumo desnecessário e reaproveitar materiais são passos importantes antes mesmo da reciclagem. Ao consumir menos, evitamos em primeiro lugar a geração de resíduos. Optar por produtos sustentáveis ​​e reutilizáveis, como sacolas de pano em vez de sacolas plásticas, é uma forma eficaz de adotar hábitos mais sustentáveis.</p>

            <h4>3.2. Compostos</h4>
            <p>A compostagem é uma forma de reciclagem natural que transforma resíduos orgânicos, como restos de alimentos e folhas secas, em composto. Além de reduzir a quantidade de resíduos enviados para aterros, o composto melhora a qualidade do solo, promove a retenção de água e nutrientes e contribui para ecossistemas saudáveis.</p>

            <h4>3.3. Economia circular</h4>
            <p>A economia circular é um conceito que propõe a reutilização contínua de materiais e recursos, eliminando a noção de “desperdício”. Nesta abordagem, os produtos são concebidos para serem reparados, reutilizados, reciclados ou compostados no final da sua vida útil. A implementação de uma economia circular pode reduzir significativamente a utilização de matérias-primas e a eliminação de resíduos, promovendo assim um ciclo sustentável de produção e consumo.</p>

            <h4>3.4. Energia renovável</h4>
            <p>A mudança para fontes de energia renováveis, como a energia solar e a eólica, é uma das medidas mais importantes para promover a sustentabilidade. Ao reduzir a dependência dos combustíveis fósseis, as energias renováveis ​​reduzem as emissões de poluentes e ajudam a mitigar as alterações climáticas.</p>

            <h3>4. Impactos positivos da reciclagem e das práticas sustentáveis ​​no meio ambiente</h3>
            <p>Quando combinadas, a reciclagem e outras práticas sustentáveis ​​podem reduzir significativamente o impacto ambiental da atividade humana. Entre as principais vantagens estão:</p>
            <ul>
                <li>Conservação dos recursos naturais: Ao reciclar e reutilizar materiais, reduzimos a pressão sobre os recursos naturais e preservamo-los para as gerações futuras.</li>
                <li>Poluição reduzida: Menos extração de matérias-primas e menos resíduos em aterros levam a menos poluição do ar, da terra e da água.</li>
                <li>Mitigação das alterações climáticas: A poupança de energia e a redução das emissões de GEE, proporcionadas pela reciclagem e pela utilização de energias renováveis, são essenciais para combater o aquecimento global.</li>
                <li>Preservar a biodiversidade: Práticas sustentáveis, como a preservação das florestas e a redução da mineração, protegem os habitats naturais e evitam a destruição de ecossistemas essenciais.</li>
            </ul>

            <h3>5. Desafios e caminhos para o desenvolvimento da reciclagem e da sustentabilidade</h3>
            <p>Embora os benefícios da reciclagem e das práticas sustentáveis ​​sejam amplamente reconhecidos, ainda existem desafios à sua adoção generalizada. A falta de infra-estruturas adequadas, a baixa sensibilização do público e a resistência das indústrias tradicionais estão entre os principais obstáculos. Porém, com políticas públicas fortes, incentivos governamentais e educação ambiental, é possível aumentar a adesão a essas práticas.</p>

            <h3>6. Conclusões</h3>
            <p>A reciclagem e as práticas sustentáveis ​​são ferramentas poderosas na luta contra a degradação ambiental. Ao reduzir o consumo de recursos naturais, poupar energia e reduzir a produção de resíduos, estas iniciativas ajudam a preservar o planeta e a mitigar os efeitos das alterações climáticas. Para garantir um futuro sustentável, é fundamental que indivíduos, empresas e governos adotem práticas conscientes, promovendo uma cultura de reciclagem e sustentabilidade em todos os setores da sociedade. Somente com esforços coletivos será possível mudar o atual cenário de destruição ambiental e garantir um planeta saudável para as gerações futuras.</p>

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
