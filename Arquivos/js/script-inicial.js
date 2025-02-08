document.getElementById('user-info-button').addEventListener('click', function() {
    const card = document.getElementById('user-info-card');
    if (card.style.display === 'none' || card.style.display === '') {
        card.style.display = 'block';
    } else {
        card.style.display = 'none';
    }
});


async function fetchNews() {
    try {
        const url = `https://gnews.io/api/v4/search?q=poluição OR "mudanças climáticas"&lang=pt&token=269a6b8083d07b9c3f04fa2938fd4708`;
        const response = await fetch(url);

        // Verifica se a resposta da API é OK
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }

        const data = await response.json();
        const newsContainer = document.getElementById("news-container");

        // Limpa o container antes de adicionar novas notícias
        newsContainer.innerHTML = '';

        // Adiciona novas notícias
        data.articles.forEach((article, index) => {
            // Ignora a última notícia
            if (index === data.articles.length - 1) return;

            const truncatedDescription = article.description.length > 150
                ? article.description.substring(0, 150) + "..."
                : article.description;

            const newsCard = document.createElement("div");
            newsCard.classList.add("col-md-4", "mb-4"); // 3 colunas com espaçamento

            newsCard.innerHTML = `
                <div class="news-card">
                    <img class="news-image" src="${article.image}" alt="${article.title}">
                    <div class="news-title">${article.title}</div>
                    <div class="news-description">${truncatedDescription}</div>
                    <a href="${article.url}" target="_blank" class="btn btn-outline-light">Leia mais</a>
                </div>
            `;
            newsContainer.appendChild(newsCard);
        });
    } catch (error) {
        console.error('Error fetching news:', error);
    }
}

// Chama a função para buscar as notícias inicialmente
fetchNews();

// Atualiza as notícias a cada 60 segundos
setInterval(fetchNews, 60000);





