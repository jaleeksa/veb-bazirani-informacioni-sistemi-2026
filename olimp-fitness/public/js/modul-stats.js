$(document).ready(function () {
    let ctx = document.getElementById('myChart').getContext('2d');
    let chart;

    function loadStats(dateFrom, dateTo) {
        $.ajax({
            url: '', // Šalje na aktuelni URL (index.php?page=stats)
            type: 'POST',
            data: { 
                dateFrom: dateFrom, 
                dateTo: dateTo 
            },
            dataType: 'json',
            success: function (response) {
                if (chart) chart.destroy();

                chart = new Chart(ctx, {
                    type: 'line', // 'line' je preglednije za hronološki prikaz datuma
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: 'Broj prodatih članarina',
                            data: response.data,
                            backgroundColor: 'rgba(231, 76, 60, 0.2)',
                            borderColor: 'rgba(231, 76, 60, 1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { stepSize: 1 }
                            },
                            x: {
                                title: { display: true, text: 'Datum prodaje' }
                            }
                        }
                    }
                });
            }
        });
    }

    // Prvo učitavanje (podrazumevani opseg)
    loadStats($('#dateFrom').val(), $('#dateTo').val());

    // Klik na dugme za filtriranje
    $('#btnFilter').click(function() {
        let from = $('#dateFrom').val();
        let to = $('#dateTo').val();
        loadStats(from, to);
    });
});