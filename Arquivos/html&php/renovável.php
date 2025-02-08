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
    <title>Energias Renováveis - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-renovável.css">
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
        <h1>Energias Renováveis</h1>
        <p class="description">
            Aprenda sobre a importância das fontes de energia renovável para um futuro sustentável.
        </p>
    </header>
    

    <main class="container my-5">
        <section class="section-background">
            <h3>1. Introdução</h3>
            <p>Nos últimos anos, a procura de energia aumentou significativamente, impulsionada pelo crescimento populacional, pela urbanização e pela industrialização. Esta procura crescente, combinada com a dependência de combustíveis fósseis, levou a graves problemas ambientais, como a poluição atmosférica, o aquecimento global e a degradação dos ecossistemas. Neste contexto, as energias renováveis ​​surgem como uma alternativa sustentável e necessária, prometendo não só satisfazer as necessidades energéticas, mas também proteger o ambiente e promover a justiça social.</p>

            <h3>2. Tipos de energia renovável</h3>
            <p>Existem muitas fontes de energia renováveis, cada uma com características e aplicações próprias. Os principais incluem:</p>

            <h4>2.1. Energia solar</h4>
            <p>A energia solar é obtida a partir da radiação solar e pode ser convertida em eletricidade através de painéis fotovoltaicos ou utilizada para aquecimento. É uma das fontes de energia renovável mais abundantes e acessíveis, com potencial para gerar eletricidade em grande escala e abastecer residências e indústrias. Além disso, a energia solar ajuda a reduzir as emissões de gases de efeito estufa.</p>

            <h4>2.2. Energia eólica</h4>
            <p>A energia eólica é produzida pelo vento, utilizando turbinas eólicas para converter a força do vento em eletricidade. Esta fonte de energia é limpa, abundante e tem potencial para fornecer grandes quantidades de eletricidade. Países como Dinamarca, Alemanha e Estados Unidos têm investido fortemente na energia eólica, demonstrando o seu potencial na matriz energética global.</p>

            <h4>2.3. Energia hidrelétrica</h4>
            <p>A energia hidrelétrica é produzida aproveitando a energia potencial da água em movimento, como rios e lagos. Embora seja um recurso renovável, a construção de grandes barragens pode ter impactos ambientais significativos, tais como a alteração de ecossistemas e o deslocamento de comunidades. No entanto, a energia hidroelétrica continua a ser uma das principais fontes de eletricidade em muitos países, contribuindo para a estabilidade da rede elétrica.</p>

            <h4>2.4. Biomassa</h4>
            <p>Biomassa é matéria orgânica utilizada como fonte de energia. Pode provir de resíduos agrícolas, florestais e urbanos. A conversão de biomassa em biocombustíveis ou eletricidade é uma forma eficiente de utilizar resíduos e reduzir a dependência de combustíveis fósseis. Além disso, a biomassa pode contribuir para a mitigação das emissões de carbono, desde que seja utilizada de forma sustentável.</p>

            <h4>2.5. Energia geotérmica</h4>
            <p>A energia geotérmica é obtida a partir do calor armazenado na Terra. Esta fonte de energia é particularmente eficaz em regiões com atividade geotérmica, como áreas vulcânicas. A energia geotérmica pode ser utilizada para aquecimento direto, geração de eletricidade e aquecimento de água, tornando-a uma opção sustentável e confiável.</p>

            <h3>3. A importância das energias renováveis</h3>
            <p>A energia renovável é essencial para um futuro sustentável por vários motivos:</p>

            <h4>3.1. Redução das emissões de gases com efeito de estufa</h4>
            <p>Uma das principais vantagens das energias renováveis é a sua capacidade de reduzir as emissões de gases com efeito de estufa responsáveis pelo aquecimento global. A mudança para uma matriz energética baseada em recursos renováveis pode ajudar a mitigar as alterações climáticas, contribuindo assim para um ambiente mais saudável.</p>

            <h4>3.2. Diversificação da matriz energética</h4>
            <p>As energias renováveis oferecem a possibilidade de diversificar a matriz energética, reduzindo assim a dependência dos combustíveis fósseis. Esta diversificação aumenta a segurança energética, minimizando os riscos associados às flutuações de preços e à escassez de recursos.</p>

            <h4>3.3. Criação de emprego e desenvolvimento económico</h4>
            <p>O setor das energias renováveis provou ser um motor de crescimento económico, criando milhões de empregos em áreas como a investigação, o desenvolvimento, a instalação e a manutenção de tecnologias limpas. Este crescimento contribui para o desenvolvimento sustentável das comunidades e para o fortalecimento da economia local.</p>

            <h4>3.4. Acesso à energia</h4>
            <p>A energia renovável, incluindo a solar e a eólica, tem potencial para fornecer energia a comunidades remotas e rurais que não têm acesso à rede eléctrica convencional. Isto promove a inclusão social e melhora a qualidade de vida das populações mais vulneráveis.</p>

            <h3>4. Desafios das energias renováveis</h3>
            <p>Apesar das muitas vantagens, a implementação de energias renováveis enfrenta desafios importantes:</p>

            <h4>4.1. Intermitência e armazenamento de energia</h4>
            <p>Uma das principais limitações das energias renováveis, especialmente solar e eólica, é a sua intermitência. A produção de energia depende das condições meteorológicas, o que pode exigir sistemas de armazenamento para garantir um fornecimento estável. Os avanços nas tecnologias de armazenamento, como as baterias de iões de lítio e de hidrogénio, são fundamentais para enfrentar este desafio.</p>

            <h4>4.2. Infraestrutura e investimentos</h4>
            <p>A transição para um sistema de energia renovável exige investimentos significativos em infraestruturas, como redes inteligentes e sistemas de transmissão. Além disso, são necessárias políticas públicas e incentivos governamentais para incentivar o desenvolvimento e a adoção de tecnologias limpas.</p>

            <h4>4.3. Resistência política e social</h4>
            <p>As mudanças nas políticas energéticas podem enfrentar resistência por parte de grupos que dependem de combustíveis fósseis. Aumentar a consciencialização e a educação sobre os benefícios das energias renováveis é fundamental para superar esta resistência e promover a aceitação pública.</p>

            <h3>5. Perspectiva futura</h3>
            <p>As perspectivas para as energias renováveis são positivas à medida que a tecnologia avança e os custos diminuem. A crescente adoção de energias renováveis em todo o mundo sinaliza uma mudança significativa na forma como a energia é produzida e consumida. Além disso, acordos internacionais, como o Acordo de Paris, sublinham a importância de uma acção coordenada para reduzir as emissões e promover o desenvolvimento sustentável.</p>

            <h3>6. Conclusões</h3>
            <p>A energia renovável é essencial para um futuro sustentável, proporcionando uma alternativa sustentável às fontes de energia não renováveis que dominam hoje. Ao reduzir as emissões de gases com efeito de estufa, diversificar a matriz energética e promover o acesso à energia, as energias renováveis podem desempenhar um papel crucial na luta contra as alterações climáticas e na construção de um mundo mais justo e sustentável. É imperativo que governos, empresas e indivíduos trabalhem em conjunto para acelerar a transição para uma matriz energética mais limpa e resiliente, garantindo um futuro melhor para as gerações vindouras.</p>

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
