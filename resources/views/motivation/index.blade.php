<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<style>
#ex_chart {max-width:640px;max-height:480px;}
</style>

<canvas id="ex_chart"></canvas>

<script>
var ctx = document.getElementById('ex_chart');

var data = {
    labels: ["1月", "2月", "3月", "4月", "5月"],
    datasets: [{
        label: 'プリンター販売台数',
        data: [880, 740, 900, 520, 930],
        borderColor: 'rgba(255, 100, 100, 1)'
    }]
};

var options = {};

var ex_chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});
</script>