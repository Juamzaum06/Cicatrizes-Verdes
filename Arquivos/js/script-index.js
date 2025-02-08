// Dados reais para o gráfico de Emissões de CO₂
const co2Data = {
    labels: ['2000', '2005', '2010', '2015', '2020', '2023'],
    datasets: [{
        label: 'Emissões de CO₂ (Milhões de toneladas)',
        data: [24414, 29724, 33561, 35856, 34810, 36500],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        pointRadius: 5,
        pointHoverRadius: 7
    }]
};

// Configuração do gráfico de Emissões de CO₂
const co2Config = {
    type: 'line',
    data: co2Data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        interaction: {
            mode: 'nearest',
            intersect: false
        },
        plugins: {
            tooltip: {
                enabled: true,
                mode: 'nearest',
                intersect: false
            }
        }
    }
};

// Renderizando o gráfico de Emissões de CO₂
const co2Chart = new Chart(
    document.getElementById('co2Chart'),
    co2Config
);

// Dados reais para o gráfico de Temperatura Global
const tempData = {
    labels: ['2000', '2005', '2010', '2015', '2020', '2023'],
    datasets: [{
        label: 'Aumento da Temperatura Global (°C)',
        data: [0.42, 0.62, 0.71, 0.87, 1.02, 1.10],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        pointRadius: 5,
        pointHoverRadius: 7
    }]
};

// Configuração do gráfico de Temperatura Global
const tempConfig = {
    type: 'line',
    data: tempData,
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        },
        interaction: {
            mode: 'nearest',
            intersect: false
        },
        plugins: {
            tooltip: {
                enabled: true,
                mode: 'nearest',
                intersect: false
            }
        }
    }
};

// Renderizando o gráfico de Temperatura Global
const tempChart = new Chart(
    document.getElementById('tempChart'),
    tempConfig
);
