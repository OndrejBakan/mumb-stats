<!DOCTYPE html>

<head>
</head>

<body>
    <div style="height: 300px">
        <canvas id="myChart"></canvas>
    </div>
    <table>
        @foreach ($events as $e)
        <tr>
            <td>{{ $e->hour }}</td>
            <td>{{ $e->datetime }}</td>
            <td>{{ $e->location }}</td>
            <td>{{ $e->count }}</td>
        </tr>
        @endforeach
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [
                    @foreach ($events->unique('location') as $location)
                    {
                        'label': {{ Js::from($location->location) }},
                        'data': {{ Js::from($events->where('location', $location->location)->values()) }},
                    },
                    @endforeach
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                barValueSpacing: 20,
                parsing: {
                    xAxisKey: 'hour',
                    yAxisKey: 'count'
                },
            }
        });
    </script>


</body>

</html>