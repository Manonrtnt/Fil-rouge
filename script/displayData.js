//! GET DATE IN JSON
async function requestApi(url) {
    //* use API fetch() / wait return and assign return value to response variable
    let response = await fetch(url);
    //* wait until request complete
    let dataPoints = await response.json();
    return dataPoints;
}

//! UPDATE CHART WITH DATA (from json)
//* method THEN() appellera le gestionnaire en lui passant un objet dataPoints qui contient la réponse du serveur.
requestApi('../controlers/displayData.php').then(dataPoints => {
    //*La méthode map() crée un nouveau tableau avec les résultats de l'appel d'une fonction fournie sur chaque élément du tableau appelant.
    const dataTemp = dataPoints.temperatureSensor.map(function (index) {
        return index.data;
    });
    const dateTemp = dataPoints.temperatureSensor.map(function (index) {
        return index.date;
    });

    //* Update chart with all data
    myChart.config.data.datasets[0].data = [dataTemp[0], dataTemp[1], dataTemp[2], dataTemp[3],];
    myChart.config.data.datasets[0].label = dateTemp[0];
    myChart.config.data.datasets[1].data = [dataTemp[4], dataTemp[5], dataTemp[6], dataTemp[7],];
    myChart.config.data.datasets[1].label = dateTemp[4];
    myChart.config.data.datasets[2].data = [dataTemp[8], dataTemp[9], dataTemp[10], dataTemp[11],];
    myChart.config.data.datasets[2].label = dateTemp[8];
    myChart.config.data.datasets[3].data = [dataTemp[12], dataTemp[13], dataTemp[14], dataTemp[15],];
    myChart.config.data.datasets[3].label = dateTemp[12];
    myChart.update();
})

//! CHART JS CONFIG
//* Data
const data = {
    labels: ["0h", "6h", "12h", "18h"],
    datasets: [{
        label: '',
        data: [],
        backgroundColor: [
            '#e7e0d2'
        ],
        borderColor: [
            '#e7e0d2'
        ],
        borderWidth: 2
    },
    {
        label: '',
        data: [],
        backgroundColor: [
            '#87b17b'
        ],
        borderColor: [
            '#87b17b'
        ],
        borderWidth: 2
    },
    {
        label: '',
        data: [],
        backgroundColor: [
            '#ffadad'
        ],
        borderColor: [
            '#ffadad'
        ],
        borderWidth: 2
    },
    {
        label: '',
        data: [],
        backgroundColor: [
            '#6fa8dc'
        ],
        borderColor: [
            '#6fa8dc'
        ],
        borderWidth: 2
    }]
};

//* Config
const config = {
    type: 'line',
    data,
    options: {
        title: {
            display: true,
            text: 'Predicted world population (millions) in 2050'
        },
        responsive: true,
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Hour',
                    color: '#87b17b',
                    font: {
                        size: 20,
                    },
                }
            },
            y: {
                display: true,
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Temperature °C',
                    color: '#87b17b',
                    font: {
                        size: 20,
                    },
                }
            }
        }
    }
}

//! CREATE CHART
const myChart = new Chart(document.getElementById('myChart'), config);