$(document).ready(function () {
let ctx = document.getElementById('myChart').getContext('2d');
let chart;

function loadData(dateFrom, dateTo) {
    $.ajax({
    url: '', // isti fajl (index.php)
    type: 'POST',
    data: { dateFrom: dateFrom, dateTo: dateTo },
    dataType: 'json',
    success: function (response) {
        let labels = response.labels;
        let data = response.data;

        if (chart) chart.destroy();

        chart = new Chart(ctx, {
        type: 'bar', // promenjeno u bar chart
        data: {
            labels: labels,
            datasets: [{
            label: 'Vrednosti po mesecima',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            x: {
                title: { display: true, text: 'Mesec/Godina' }
            },
            y: {
                title: { display: true, text: 'Vrednost' },
                beginAtZero: true
            }
            }
        }
        });
    }
    });
}

loadData($('#dateFrom').val(), $('#dateTo').val());

$('#filterForm').on('submit', function (e) {
    e.preventDefault();
    let dateFrom = $('#dateFrom').val();
    let dateTo = $('#dateTo').val();
    loadData(dateFrom, dateTo);
});
});