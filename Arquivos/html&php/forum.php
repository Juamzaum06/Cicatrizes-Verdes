<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION['user_nome'];
$user_email = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];

require 'config.php'; // Inclui a conexão com o banco de dados

// Configuração para paginação e filtros
$postsPerPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $postsPerPage;

$filterByLikes = isset($_GET['filter_likes']) ? $_GET['filter_likes'] : '';
$filterByDate = isset($_GET['filter_date']) ? $_GET['filter_date'] : '';

// Condição para ordenar por likes ou data
$orderBy = 'p.created_at DESC'; // Padrão é por data
$additionalWhere = '';

if ($filterByLikes === 'asc') {
    $orderBy = 'likes ASC';
} elseif ($filterByLikes === 'desc') {
    $orderBy = 'likes DESC';
}

if ($filterByDate === 'newest') {
    $orderBy = 'p.created_at DESC';
} elseif ($filterByDate === 'oldest') {
    $orderBy = 'p.created_at ASC';
}

// Consulta para obter postagens com likes
try {
    $stmt = $pdo->prepare("
        SELECT p.id, p.usuario_nome, p.conteudo, p.created_at, 
               COUNT(l.id) AS likes 
        FROM posts p
        LEFT JOIN likes l ON p.id = l.post_id
        GROUP BY p.id
        ORDER BY $orderBy
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindParam(':limit', $postsPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar postagens: " . $e->getMessage());
}

// Total de postagens para paginação
try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM posts");
    $totalPosts = $stmt->fetchColumn();
    $totalPages = ceil($totalPosts / $postsPerPage);
} catch (PDOException $e) {
    die("Erro ao contar postagens: " . $e->getMessage());
}

// Carregar comentários
$comentarios = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM comentarios ORDER BY created_at ASC");
    $stmt->execute();
    $comentariosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comentariosArray as $comentario) {
        $comentarios[$comentario['post_id']][] = $comentario;
    }
} catch (PDOException $e) {
    die("Erro ao carregar comentários: " . $e->getMessage());
}


// Verifica o filtro de usuário
$filterByUser = isset($_GET['filter_user']) && $_GET['filter_user'] === 'user';

// Condição de filtragem
$whereClause = '';
if ($filterByUser) {
    $whereClause = "WHERE p.usuario_nome = :user_name"; // Filtra pelas postagens do usuário logado
}

// Consulta para obter postagens com likes
try {
    $stmt = $pdo->prepare("
        SELECT p.id, p.usuario_nome, p.conteudo, p.created_at, 
               COUNT(l.id) AS likes 
        FROM posts p
        LEFT JOIN likes l ON p.id = l.post_id
        $whereClause
        GROUP BY p.id
        ORDER BY $orderBy
        LIMIT :limit OFFSET :offset
    ");

    // Se o filtro for para postagens do usuário, bind do nome do usuário
    if ($filterByUser) {
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    }

    // Bind dos parâmetros de limite e offset
    $stmt->bindParam(':limit', $postsPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar postagens: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum - Cicatrizes Verdes</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles/style-forum.css">
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
        <h5 class="card-title" style="color: #56ab2f;">Informações do Usuário</h5>
        <p class="card-text"><strong>Nome:</strong> <?php echo htmlspecialchars($user_name); ?></p>
        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p> <!-- Adicione a variável $user_email -->
        <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($user_id); ?></p> <!-- Adicione a variável $user_id -->
        <form action="logout.php" method="POST">
        <button type="submit" class="btn btn-danger" style="background-color: #e8f5e9;color: #56ab2f;border: none;width: 70px;height: 50px;">Sair</button>
        </form>
    </div>

</div>
        <div class="green">
        <h1 class="text-center" style="color:white; margin-top: 35px;">Bem-vindo ao Fórum da Comunidade</h1>
        
        <!-- Filtros de postagens -->
        <div class="filters">
            <form method="GET" action="" class="">
                <label for="filter_likes" class="filter-label">Curtidas:</label>
                <select name="filter_likes" id="filter_likes" class="filter-select">
                    <option value="">Selecione</option>
                    <option value="asc" <?= $filterByLikes === 'asc' ? 'selected' : ''; ?>>Menor para Maior</option>
                    <option value="desc" <?= $filterByLikes === 'desc' ? 'selected' : ''; ?>>Maior para Menor</option>
                </select>

                <label for="filter_date" class="filter-label">Data:</label>
                <select name="filter_date" id="filter_date" class="filter-select">
                    <option value="">Selecione</option>
                    <option value="newest" <?= $filterByDate === 'newest' ? 'selected' : ''; ?>>Mais Recentes</option>
                    <option value="oldest" <?= $filterByDate === 'oldest' ? 'selected' : ''; ?>>Mais Antigas</option>
                </select>

                <label for="filter_user" class="filter-label">Postagens de:</label>
                <select name="filter_user" id="filter_user" class="filter-select">
                    <option value="">Todos</option>
                    <option value="user" <?= isset($_GET['filter_user']) && $_GET['filter_user'] === 'user' ? 'selected' : ''; ?>>Somente você</option>
                </select>

                <button id="button_filter">Filtrar</button>
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Formulário para criar nova postagem -->
        <?php if (isset($_SESSION['user_id'])): ?>
                <form action="post_process.php" method="POST" class="mb-4">
                    <div class="form-group">
                        <textarea name="postagem" class="form-control" id="create_post" rows="4" placeholder="Escreva sua postagem..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-light btn-block">Postar</button>
                </form>
            <?php else: ?>
                <p class="text-center">Por favor, <a href="login.php" class="text-light">faça login</a> para postar.</p>
            <?php endif; ?>


        <!-- Exibição de postagens -->
        <?php foreach ($posts as $post): ?>
            <div class="post">
            <h3 class="post-title"><?= htmlspecialchars($post['usuario_nome']); ?></h3>
            <p class="post-content"><?= nl2br(htmlspecialchars($post['conteudo'])); ?></p>
            <?php $formattedDate = date("d/m/Y", strtotime($post['created_at'])); ?>
            <small class="post-date">Postado em: <?= $formattedDate; ?></small>
            <p class="post-likes">
                <i class="fas fa-thumbs-up"></i> <?= $post['likes']; ?>
            </p>


                <!-- Botão de curtir -->
                <form class="like-form" style="display: inline;">
                    <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                    <button type="submit" class="btn btn-like" style="margin-top: -20px;">Curtir</button>
                </form>


                <!-- Botão de excluir (apenas para o autor do post) -->
                <?php if ($post['usuario_nome'] === $user_name): ?>
                <form action="delete_post.php" method="POST" style="display: inline;">
                    <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                    <button 
                        type="submit" 
                        class="btn btn-danger btn-sm" 
                        style="background: none; border: none; color: red; margin-top: -20px;" 
                        title="Excluir postagem"
                        onclick="return confirm('Tem certeza que deseja excluir esta postagem? Essa ação não poderá ser desfeita.');">
                        <i class="bi bi-trash"></i> <!-- Ícone de lixeira do Bootstrap -->
                    </button>
                </form>
                <?php endif; ?>


               <!-- Comentários -->
                <h4 style="margin-top: 20px;">Comentários:</h4>
                <div class="comment-section">
                    <?php if (!empty($comentarios[$post['id']])): ?>
                        <?php foreach ($comentarios[$post['id']] as $comentario): ?>
                            <div class="comment">
                                <strong><?= htmlspecialchars($comentario['usuario_nome']); ?></strong>
                                <p><?= nl2br(htmlspecialchars($comentario['conteudo'])); ?></p>
                                <?php $formattedDate = date("d/m/Y", strtotime($post['created_at'])); ?>
                                <small class="post-date">Postado em: <?= $formattedDate; ?></small>

                                <?php if ($_SESSION['user_id'] == $comentario['usuario_id']): ?>
                                    <!-- Ícone de lixeira para excluir -->
                                    <a href="excluir_comentario.php?id=<?= $comentario['id']; ?>" 
                                    onclick="return confirm('Tem certeza que deseja excluir este comentário? Essa ação não poderá ser desfeita.');"
                                    class="text-danger" 
                                    title="Excluir comentário">
                                        <i class="bi bi-trash" style="margin-left: 15px; color: red;"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum comentário ainda.</p>
                    <?php endif; ?>

                    <!-- Formulário para comentar -->
                    <form action="comment_process.php" method="POST">
                        <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                        <textarea name="comentario" id="create_post" class="form-control" rows="2" placeholder="Escreva um comentário..." required></textarea>
                        <button type="submit" class="btn btn-comment">Comentar</button>
                    </form>
                </div>
    </div>
        <?php endforeach; ?>



        <!-- Navegação de páginas -->
        <nav class="pagination-nav">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $page === $i ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?><?= $filterByLikes ? "&filter_likes=$filterByLikes" : ''; ?><?= $filterByDate ? "&filter_date=$filterByDate" : ''; ?><?= isset($_GET['filter_user_posts']) ? "&filter_user_posts=" . $_GET['filter_user_posts'] : ''; ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
</div>


</body>
</html>


    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script-forum.js"></script>
</body>
</html>
