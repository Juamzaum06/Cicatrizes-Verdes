document.getElementById('user-info-button').addEventListener('click', function() {
    const card = document.getElementById('user-info-card');
    if (card.style.display === 'none' || card.style.display === '') {
        card.style.display = 'block';
    } else {
        card.style.display = 'none';
    }
});


const questions = document.querySelectorAll('.question');
    let currentQuestion = 0;

    // Configuração da barra de progresso
    const progressBar = document.getElementById('progress-bar');
    const progressStep = 100 / questions.length;

    function updateProgressBar() {
        const progressValue = (currentQuestion / (questions.length - 1)) * 100;
        progressBar.style.width = `${progressValue}%`;
        progressBar.setAttribute('aria-valuenow', progressValue);
    }

    // Função para ir para a próxima pergunta
    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentQuestion < questions.length - 1) {
            questions[currentQuestion].classList.add('d-none');
            currentQuestion++;
            questions[currentQuestion].classList.remove('d-none');
            updateProgressBar();
        } else {
            // Calcula os resultados finais aqui e exibe o resultado
            calculateResults();
        }
    });

    function calculateResults() {
    let dailyEmission = 0;

    // Captura dos valores das respostas
    const transport = document.getElementById('transport').value;
    const distance = parseFloat(document.getElementById('distance').value);
    const flights = parseFloat(document.getElementById('flights').value);
    const energy = parseFloat(document.getElementById('energy').value);
    const people = parseFloat(document.getElementById('people').value);
    const highDemand = document.getElementById('highDemand').value;
    const solar = document.getElementById('solar').value;
    const meatConsumption = parseFloat(document.getElementById('meatConsumption').value);
    const organic = document.getElementById('organic').value;
    const clothes = parseFloat(document.getElementById('clothes').value);
    const carbonHabbit = document.getElementById('carbonHabbit').value;

    // Cálculo de emissões com base nas respostas
    switch (transport) {
        case 'carro':
            dailyEmission += distance * 0.25;
            break;
        case 'onibus':
            dailyEmission += distance * 0.05;
            break;
        case 'metro':
            dailyEmission += distance * 0.03;
            break;
        case 'bicicleta':
        case 'ape':
            dailyEmission += 0;
            break;
    }

    // Ajustes adicionais
    const energyPerPerson = energy / people;
    dailyEmission += flights * 0.4;
    dailyEmission += (energyPerPerson / 30) * 0.7;

    if (highDemand === 'sim') dailyEmission += 3;
    if (solar === 'não') dailyEmission += 1;
    dailyEmission += meatConsumption * 0.5;
    if (organic === 'não') dailyEmission += 1;
    dailyEmission += clothes * 0.2;
    if (carbonHabbit === 'sim') dailyEmission += 2;

    const monthlyEmission = dailyEmission * 30;
    const yearlyEmission = dailyEmission * 365;

    // Status de emissões e cor
    let status = '';
    let statusClass = '';
    if (dailyEmission < 6) {
        status = 'Baixo';
        statusClass = 'low'; // Verde
    } else if (dailyEmission < 14) {
        status = 'Médio';
        statusClass = 'medium'; // Amarelo
    } else {
        status = 'Alto';
        statusClass = 'high'; // Vermelho
    }

    // Exibir resultados
    document.getElementById('dailyEmission').textContent = `Emissões diárias: ${dailyEmission.toFixed(2)} kg de CO2`;
    document.getElementById('monthlyEmission').textContent = `Emissões mensais: ${monthlyEmission.toFixed(2)} kg de CO2`;
    document.getElementById('yearlyEmission').textContent = `Emissões anuais: ${yearlyEmission.toFixed(2)} kg de CO2`;
    document.getElementById('status').textContent = `Status: ${status}`;

    // Aplica a classe de cor no status
    const statusElement = document.getElementById('status');
    statusElement.className = statusClass; // Aplica a classe diretamente

    // Exibe o resultado
    document.getElementById('result').classList.remove('d-none');
}


    // Atualiza a barra de progresso na primeira carga
    updateProgressBar();