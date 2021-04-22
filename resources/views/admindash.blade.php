<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard for Admin') }}--}}
            {{ __('lang.admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="chart__bar">
                        <canvas id="bar" width="600px" height="200px">

                        </canvas>
                    </div>
                    <div class="chart__pie">
                        <canvas id="pie" width="600px" height="200px">

                        </canvas>
                    </div>
                    <div class="chart__line">
                        <canvas id="line" width="600px" height="200px">

                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .chart__pie {
            margin: 50px 0;
        }
    </style>
    <script>
        var canvasBar = document.getElementById('bar');
        var bar = new Chart(canvasBar, {
            type: 'bar',
            data: {
                labels: ["Квартиры", "Дома", "Дачи"],
                datasets: [
                    {
                        label: 'Bar chart',
                        data: [6, 2, 1],
                        backgroundColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 129, 102, 1)',
                            'rgba(234, 162, 235, 1)',
                        ],
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var canvasPie = document.getElementById('pie')
        var pie = new Chart(canvasPie, {
            type: 'pie',
            data: {
                labels: ["Квартиры", "Дома", "Дачи"],
                datasets: [
                    {
                        label: 'Pie chart',
                        data: [20, 50, 30],
                        backgroundColor: [
                            'rgba(255, 129, 102, 1)',
                            'rgba(234, 162, 235, 1)',
                            'rgba(255, 206, 36, 1)',
                        ],
                    }
                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var canvasLine = document.getElementById('line')
        var line = new Chart(canvasLine, {
            type: 'line',
            data: {
                labels: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'воскресенье'],
                datasets: [{
                    label: 'Line chart',
                    data: [10, 70, 130, 81, 60, 80, 160],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
