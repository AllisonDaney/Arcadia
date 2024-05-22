@extends('layouts/admin')

@section('title', 'Arcadia - Admin')

@section('content')

<main class="py-24 px-4 sm:pl-[255px]">
    <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
        Dashboard
    </h1>
    <div class="grid grid-cols-2 gap-4 ml-6 mt-10">
        @foreach ($dataSets as $dataSet)
            <div>
                <canvas class="chart-animal" data-set="{{ json_encode($dataSet) }}"></canvas>
            </div>
        @endforeach
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="module">
    window.addEventListener('load', function() {
        const MONTHS = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Decembre'
        ];

        const months = (config) => {
            var cfg = config || {};
            var count = cfg.count || 12;
            var section = cfg.section;
            var values = [];
            var i, value;

            for (i = 0; i < count; ++i) {
                value = MONTHS[Math.ceil(i) % 12];
                values.push(value.substring(0, section));
            }

            return values;
        }

        const labels = months({ count: 12, section: 3 });

        const chartAnimals = document.querySelectorAll('.chart-animal')

        for(let chartAnimal of chartAnimals) {
            const dataSets = chartAnimal.getAttribute('data-set')
            let dataSetsParsed = []

            for(let dataSet of JSON.parse(dataSets)) {
                dataSetsParsed = [...dataSetsParsed, {
                    label: dataSet.name,
                    data: dataSet.data,
                    fill: false,
                    borderColor: `#${Math.floor(Math.random()*16777215).toString(16)}`,
                    tension: 0.1
                }]
            }

            new Chart(chartAnimal, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: dataSetsParsed
                },
                options: {
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        }
    })
</script>
@endsection
