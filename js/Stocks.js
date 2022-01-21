const { Chart } = require("chart.js");

let mujGraf = document.getElementById('mujGraf').getContext('2d');

const graf = new Chart(mujGraf, {
    type: 'line',
    data: {
        labels: [],
        datasets: []
    }
});