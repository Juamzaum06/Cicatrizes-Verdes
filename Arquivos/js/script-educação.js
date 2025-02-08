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
