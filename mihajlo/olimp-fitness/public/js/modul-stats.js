$(document).ready(function () {
    let ctx = document.getElementById('myChart').getContext('2d');
    let chart;
    let pieChart;
    let tableData = [];
    

    function loadStats(dateFrom, dateTo) {
        $.ajax({
            url: '', 
            type: 'POST',
            data: { 
                dateFrom: dateFrom, 
                dateTo: dateTo 
            },
            dataType: 'json',
            success: function (response) {

            console.log(response); // debug

            // ✅ BAR CHART
            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.labels || [],
                    datasets: [{
                        label: 'Ukupan prihod (RSD)',
                        data: response.prihod || [],
                        backgroundColor: 'rgba(75, 160, 91, 0.85)',
                        borderColor: '#4ba05b',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Prihod od prodaje članarina po mesecima',
                            font: { size: 18 }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'Prihod u RSD' },
                            grace: '5%'
                        },
                        x: {
                            title: { display: true, text: 'Mesec' }
                        }
                    }
                }
            });

            // ✅ PIE CHART (IDE ODVOJENO!)
            if (pieChart) pieChart.destroy();

            let ctxPie = document.getElementById('pieChart').getContext('2d');

            pieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: response.pieLabels || [],
                    datasets: [{
                        data: response.pieData || [],
                        backgroundColor: [
                            '#4ba05b',
                            '#ff6384',
                            '#36a2eb',
                            '#ffce56',
                            '#9b59b6',
                            '#e67e22',
                            '#1abc9c',
                            '#3498db',
                            '#f39c12',
                            '#d35400'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Procenat broja članarina po treningu'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    let value = context.raw;
                                    let percent = ((value / total) * 100).toFixed(1);
                                    return `${context.label}: ${percent}% (${value} članarina)`;
                                }
                            }
                        }
                    }
                }
            });

            tableData = response.tableData || [];
            renderStatsTable(tableData);
        },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Došlo je do greške prilikom učitavanja podataka.');
            }
        });
    }

    function renderStatsTable(rows) {
        let filter = $('#tableSearch').val().trim().toLowerCase();
        let filtered = rows.filter(function(row) {
            if (!filter) return true;
            return (
                String(row.username).toLowerCase().includes(filter) ||
                String(row.title).toLowerCase().includes(filter) ||
                String(row.user_id).toLowerCase().includes(filter) ||
                String(row.training_id).toLowerCase().includes(filter)
            );
        });

        let tableBody = $('#statsTableBody');
        tableBody.empty();

        if (filtered.length === 0) {
            $('#statsTableEmpty').show();
            $('#statsTable').hide();
            return;
        }

        $('#statsTableEmpty').hide();
        $('#statsTable').show();

        filtered.forEach(function(row) {
            let deletedAt = row.deleted_at ? row.deleted_at : '-';
            tableBody.append(`
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.user_id}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.username}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.training_id}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.title}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.price}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${deletedAt}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e0e0e0;">${row.start_date}</td>
                </tr>
            `);
        });
    }

    // Početno učitavanje
    loadStats('2025-01-01', $('#dateTo').val());

    $('#tableSearch').on('input', function() {
        renderStatsTable(tableData);
    });

    // Dugme za filtriranje
    $('#btnFilter').click(function() {
        let from = $('#dateFrom').val();
        let to = $('#dateTo').val();
        if (from && to) {
            loadStats(from, to);
        } else {
            alert('Molimo unesite oba datuma.');
        }
    });
});