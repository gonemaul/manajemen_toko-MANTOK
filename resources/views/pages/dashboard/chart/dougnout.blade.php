<div class="doughnut">
    <div class="wrapper w-100">
        <div class="chart-container">
            <canvas id="myDoughnutChart"></canvas>
            <div class="chart-center">
                <div class="total" id="total">0</div>
                <div class="title">Aktivitas</div>
            </div>
        </div>
        <div class="legend-container">
            <div class="legend-row">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #F6D047;"></div>Ongoing <div class="total"
                        id="ongoing">0
                    </div>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #666;"></div>Pending <div class="total"
                        id="pending">
                        0</div>
                </div>
            </div>
            <div class="legend-row">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #FA8C1B;"></div>Checking <div class="total"
                        id="checking">0
                    </div>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #77C6C8;"></div>Payment <div class="total"
                        id="payment">0
                    </div>
                </div>
            </div>
            <div class="legend-row">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #AEAEAE;"></div>Invoice <div class="total"
                        id="invoice">0
                    </div>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #5BC3A2;"></div>Done <div class="total"
                        id="done">0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            initDoughnutChart();
        });
        // Create the chart
        const config = {
            type: 'doughnut',
            options: {
                aspectRatio: 1,
                plugins: {
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                // Format label tooltip
                                let label = context.label || '';
                                if (context.parsed !== null) {
                                    label += ': ' + context.raw; // Menampilkan data raw
                                }
                                return label;
                            },
                            // Customize title and other parts if needed
                            title: function() {
                                return 'Aktivitas'; // Title tooltip
                            }
                        }
                    },
                    legend: {
                        display: false
                    },
                    datalabels: {
                        formatter: (value, context) => {
                            if (value === 0) {
                                return ''; // Jangan tampilkan label untuk nilai 0
                            }
                            let sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = Math.round((value * 100) / sum) + "%";
                            return percentage;
                        },
                        color: '#fff',
                        font: {
                            size: 9,
                            weight: '300'
                        }
                    }
                }
            },
            plugins: [ChartDataLabels] // Include the ChartDataLabels plugin
        };

        const myDoughnutChart = new Chart(
            document.getElementById('myDoughnutChart'),
            config
        );

        const initDoughnutChart = async () => {
            // $.ajax({
            //     url: '',
            //     type: 'GET',
            //     success: function(response) {
            //         if (response.data) {
            //             myDoughnutChart.data = response.data.data;
            //             myDoughnutChart.update();
            //             const data = response.data.data.datasets[0].data;
            //             $('#total').html(response.data.data.total)
            //             $('#ongoing').html(data[0]);
            //             $('#pending').html(data[1]);
            //             $('#checking').html(data[2]);
            //             $('#invoice').html(data[3]);
            //             $('#payment').html(data[4]);
            //             $('#done').html(data[5]);
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         console.error("Error fetching chart data:", error);
            //     }
            // });
        }
    </script>
@endpush
