<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .dashboard {
            display: flex;
            gap: 20px;
        }
        .card {
            width: 1000px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-card {
            width: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dados da Obra</h1>

    <div>
        <div class="dashboard">
            <div class="card">
                <h2>Tempo Estimado</h2>
                <p id="estimatedTime"><?php echo getEstimatedTime(); ?> dias</p>
            </div>

            <div class="card">
                <h2>Trabalhadores</h2>
                <p id="workerCount"><?php echo getWorkerCount(); ?></p>
            </div>

            <div class="card form-card">
                <h2>Atualizar Dados</h2>
                <form id="updateForm">
                    <label for="timeInput">Tempo Estimado (dias): </label>
                    <input type="number" id="timeInput" name="timeInput" value="<?php echo getEstimatedTime(); ?>"><br>

                    <label for="workerInput">Trabalhadores: </label>
                    <input type="number" id="workerInput" name="workerInput" value="<?php echo getWorkerCount(); ?>"><br>

                    <button type="button" onclick="updateChart()">Atualizar Gráfico</button>
                </form>
            </div>
        </div>

        <div class="dashboard">
            <div class="card">
                <h2>Gráfico de Materiais por Mês</h2>
                <canvas id="materialChart" width="840" height="200"></canvas>
            </div>
            <div class="card form-card">
                <h2>Adicionar Dados de Material</h2>
                <form id="materialForm">
                    <label for="materialType">Tipo de Material: </label>
                    <input type="text" id="materialType" name="materialType" required><br>

                    <label for="materialValue">Valor (R$): </label>
                    <input type="number" id="materialValue" name="materialValue" required><br>

                    <label for="materialMonth">Mês: </label>
                    <input type="text" id="materialMonth" name="materialMonth" required><br>

                    <button type="button" onclick="addMaterial()">Adicionar Material</button>
                </form>
            </div>
        </div>

        <div class="dashboard">
            <div id="residueCharts" class="card">
                <h2>Gráfico de Resíduos por Mês</h2>
                <canvas id="residueChart" width="840" height="200"></canvas>
            </div>
            <div class="card form-card">
                <h2>Adicionar Dados de Resíduo</h2>
                <form id="residueForm">
                    <label for="residueClassA">Classe A (kg): </label>
                    <input type="number" id="residueClassA" name="residueClassA" required><br>

                    <label for="residueClassB">Classe B (kg): </label>
                    <input type="number" id="residueClassB" name="residueClassB" required><br>

                    <label for="residueClassC">Classe C (kg): </label>
                    <input type="number" id="residueClassC" name="residueClassC" required><br>

                    <label for="residueClassD">Classe D (kg): </label>
                    <input type="number" id="residueClassD" name="residueClassD" required><br>

                    <label for="residueMonth">Mês: </label>
                    <input type="text" id="residueMonth" name="residueMonth" required><br>

                    <button type="button" onclick="addResidue()">Adicionar Resíduo</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateChart() {
            var estimatedTime = document.getElementById('timeInput').value;
            var workerCount = document.getElementById('workerInput').value;

            document.getElementById('estimatedTime').textContent = estimatedTime + ' dias';
            document.getElementById('workerCount').textContent = workerCount;
        }
        
        var residueData = [];

        function addResidue() {
            var residueClassA = document.getElementById('residueClassA').value;
            var residueClassB = document.getElementById('residueClassB').value;
            var residueClassC = document.getElementById('residueClassC').value;
            var residueClassD = document.getElementById('residueClassD').value;
            var residueMonth = document.getElementById('residueMonth').value;

            residueData.push({
                classA: residueClassA,
                classB: residueClassB,
                classC: residueClassC,
                classD: residueClassD,
                month: residueMonth
            });

            updateResidueCharts();

            document.getElementById('residueClassA').value = '';
            document.getElementById('residueClassB').value = '';
            document.getElementById('residueClassC').value = '';
            document.getElementById('residueClassD').value = '';
            document.getElementById('residueMonth').value = '';
        }

        function updateResidueCharts() {
            document.getElementById('residueCharts').innerHTML = '';

            var months = residueData.map(function (item) {
                return item.month;
            });

            var classAData = residueData.map(function (item) {
                return item.classA;
            });
            var classBData = residueData.map(function (item) {
                return item.classB;
            });
            var classCData = residueData.map(function (item) {
                return item.classC;
            });
            var classDData = residueData.map(function (item) {
                return item.classD;
            });

            var canvas = document.createElement('canvas');
            canvas.id = 'residueChart';
            canvas.width = 400;
            canvas.height = 300;
            document.getElementById('residueCharts').appendChild(canvas);

        var ctxResidue = document.getElementById('residueChart').getContext('2d');
        var residueChart = new Chart(ctxResidue, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Classe A (kg)',
                        data: classAData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Classe B (kg)',
                        data: classBData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Classe C (kg)',
                        data: classCData,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Classe D (kg)',
                        data: classDData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
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

        var materialData = [];

        function addMaterial() {
            var materialType = document.getElementById('materialType').value;
            var materialValue = document.getElementById('materialValue').value;
            var materialMonth = document.getElementById('materialMonth').value;

            materialData.push({ type: materialType, value: materialValue, month: materialMonth });

            updateMaterialChart();
        }

        var ctxMaterial = document.getElementById('materialChart').getContext('2d');
        var materialChart = new Chart(ctxMaterial, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Materiais por Mês',
                    data: [],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
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

        function updateMaterialChart() {
            var materialLabels = materialData.map(function (item) {
                return item.type + ' - ' + item.month;
            });

            var materialValues = materialData.map(function (item) {
                return item.value;
            });

            materialChart.data.labels = materialLabels;
            materialChart.data.datasets[0].data = materialValues;
            materialChart.update();
        }
    </script>
    <?php
        function getEstimatedTime() {
           
        }

        function getWorkerCount() {

        }
    ?>
</body>
</html>
