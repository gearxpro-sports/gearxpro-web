@props(['type' => 'line', 'labels', 'values', 'datasets', 'displayLabel' => true])
<div
		wire:ignore
		x-data="{
        labels: {{ json_encode($labels) }},
        values: {{ json_encode($values) }},
        init() {
            let chart = new Chart(this.$refs.canvas.getContext('2d'), {
                type: '{{ $type }}',
                data: {
                    labels: this.labels,
                    datasets: {{ json_encode($datasets) }},
                },
                options: {
                    interaction: { intersect: false },
                    scales: { y: { beginAtZero: true }},
                    plugins: {
                        legend: { display: @json($displayLabel) },
                        tooltip: {
                            displayColors: false,
                            /*callbacks: {
                                label(point) {
                                    return 'Vendite: '+point.formattedValue+'€'
                                }
                            }*/
                        }
                    }
                }
            })

            this.$watch('values', () => {
                chart.data.labels = this.labels
                chart.data.datasets[0].data = this.values
                chart.update()
            })
        }
    }"
		class="w-full h-full"
>
	<canvas x-ref="canvas" class="max-w-full max-h-full rounded-lg bg-white"></canvas>
</div>
