@extends('layouts.common')

@section('title', 'index page')

@section('content')

    <div class="container center-block">
        <div class="page-header">
            <h1 class="text-center">Your motivation graph for the last two weeks</h1>
        </div>

        <div class="mt-5">
            <canvas id="ex_chart"></canvas>

            <script>
                var ctx = document.getElementById('ex_chart');

                var data = {
                    labels: @json($reverse_dates),
                    datasets: [{
                            label: 'before',
                            data: @json($reverse_before_scores),
                            borderColor: 'rgba(255, 100, 100, 1)',
                            fill: false,
                        },
                        {
                            label: 'after',
                            data: @json($reverse_after_scores),
                            borderColor: 'rgba(100, 100, 255, 1)',
                            fill: false,
                        }
                    ]
                };

                var options = {};

                var ex_chart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: options
                });

            </script>
        </div>
    </div>

@endsection
