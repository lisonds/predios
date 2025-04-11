$(document).ready(function() {
    // Etiquetas comunes
    const labels = ['January', 'February', 'March', 'April', 'May', 'June'];

    // Gráfico de barras
    const salesChart = new Chart($('#sales-chart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ventas',
                backgroundColor: '#6610f2',
                data: [5, 10, 5, 2, 20, 30, 45],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: 'Ventas Mensuales'
                }
            }
        }
    });

    // Gráfico de dona
    const visitorsChart = new Chart($('#visitors-chart'), {
        type: 'doughnut',
        data: {
            labels: ['Children', 'Teenager', 'Parent'],
            datasets: [{
                label: 'Visitantes',
                backgroundColor: ['#6610f2', '#198754', '#ffc107'],
                data: [40, 60, 80],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribución de Visitantes'
                }
            }
        }
    });
});
