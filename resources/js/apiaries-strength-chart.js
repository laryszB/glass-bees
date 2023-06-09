document.addEventListener("DOMContentLoaded", function () {
    const yearSelect = document.getElementById("yearSelect");
    const ctx = document.getElementById("strengthChart").getContext('2d');

    let chart; // Zmienna do przechowywania instancji wykresu.

    // Funkcja do tworzenia wykresu
    function createChart(apiaries, averageWeights) {
        if (chart) {
            chart.destroy(); // Usuń istniejący wykres przed utworzeniem nowego
        }

        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: apiaries,
                datasets: [{
                    label: 'Średnia waga miodu na ul (kg)',
                    data: averageWeights,
                    backgroundColor: apiaries.map(() => `hsl(${Math.random() * 360}, 100%, 75%)`),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    maxBarThickness: 150 // Ustawia maksymalną szerokość słupka na 150 pikseli
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Funkcja do pobierania danych i tworzenia wykresu
    function fetchDataAndCreateChart(year) {
        fetch(`/api/apiaries-strength-chart-data/${year}`)
            .then(response => response.json())
            .then(data => {
                createChart(data.apiaries, data.average_weights);
            })
            .catch(error => console.error("Wystąpił błąd podczas pobierania danych wykresu:", error));
    }

    // Pobierz dane i utwórz wykres na podstawie aktualnie wybranego roku
    fetchDataAndCreateChart(yearSelect.value);

    // Dodaj nasłuchiwanie zdarzeń do selecta, aby zaktualizować wykres po zmianie roku
    yearSelect.addEventListener("change", function () {
        fetchDataAndCreateChart(this.value);
    });
});
