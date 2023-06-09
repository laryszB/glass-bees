document.addEventListener("DOMContentLoaded", function () {
    const apiarySelect = document.getElementById('apiarySelect');
    const ctx = document.getElementById('harvestChart').getContext('2d');

    let harvestChart;

    function formatDate(date) {
        const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
        return new Date(date).toLocaleDateString(undefined, options);
    }

    function formatProfitLabel(value) {
        return value + " zł";
    }

    function fetchAndRenderChart(apiaryId) {
        axios.get(`/api/profit-chart-data/${apiaryId}`)
            .then(function (response) {
                const harvests = response.data;

                const labels = harvests.map(harvest => formatDate(harvest.harvest_date));
                const profits = harvests.map(harvest => harvest.profit);

                if (harvestChart) {
                    harvestChart.destroy();
                }

                harvestChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Zysk',
                            data: profits,
                            backgroundColor: 'rgba(34,129,4,0.2)',
                            borderColor: 'rgb(43,161,5)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function (value) {
                                        return formatProfitLabel(value);
                                    }
                                }
                            }
                        }
                    }
                });
            });
    }

    apiarySelect.addEventListener('change', function (event) {
        const selectedApiaryId = event.target.value;
        fetchAndRenderChart(selectedApiaryId);
    });

    const initialApiaryId = apiarySelect.value;
    fetchAndRenderChart(initialApiaryId);
});
