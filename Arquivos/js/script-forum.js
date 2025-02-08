document.getElementById('user-info-button').addEventListener('click', function() {
    const card = document.getElementById('user-info-card');
    if (card.style.display === 'none' || card.style.display === '') {
        card.style.display = 'block';
    } else {
        card.style.display = 'none';
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    // Animação de fade-in ao carregar a página
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
    });

    setTimeout(() => {
        cards.forEach(card => {
            card.style.transition = 'opacity 1s ease-in-out, transform 1s ease-in-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        });
    }, 200);
});

document.querySelectorAll('.like-form').forEach(form => {
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio tradicional do formulário

        const postId = this.querySelector('input[name="post_id"]').value;
        console.log('Post ID:', postId); // Para depuração

        // Verifique se o postId é válido
        if (!postId || isNaN(postId)) {
            console.error('Erro: ID do post inválido.');
            return;
        }

        // Envia a requisição AJAX
        fetch('like_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `post_id=${postId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
                const button = this.querySelector('button'); // Acessa o botão de curtir

                // Altera o texto do botão com base na ação realizada
                if (data.action === 'like') {
                    button.textContent = 'Descurtir';
                } else {
                    button.textContent = 'Curtir';
                }
            } else {
                console.error(data.message);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
    });
});

