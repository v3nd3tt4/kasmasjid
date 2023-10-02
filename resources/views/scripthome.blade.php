<script>
    var barChartData = {
        labels: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"
        ],

        datasets: [{
                label: "Pemasukan",
                backgroundColor: "lightblue",
                borderColor: "lightblue",
                borderWidth: 1,
                data: [{{convertk($chart_pemasukan->pemasukan_januari)}},
                    {{convertk($chart_pemasukan->pemasukan_februari)}},
                    {{convertk($chart_pemasukan->pemasukan_maret)}},
                    {{convertk($chart_pemasukan->pemasukan_april)}},
                    {{convertk($chart_pemasukan->pemasukan_mei)}},
                    {{convertk($chart_pemasukan->pemasukan_juni)}},
                    {{convertk($chart_pemasukan->pemasukan_juli)}},
                    {{convertk($chart_pemasukan->pemasukan_agustus)}},
                    {{convertk($chart_pemasukan->pemasukan_september)}},
                    {{convertk($chart_pemasukan->pemasukan_oktober)}},
                    {{convertk($chart_pemasukan->pemasukan_november)}},
                    {{convertk($chart_pemasukan->pemasukan_desember)}},
                ]
            },
            {
                label: "Pengeluaran",
                backgroundColor: "red",
                borderColor: "red",
                borderWidth: 1,
                data: [{{convertk($chart_pengeluaran->pengeluaran_januari)}},
                    {{convertk($chart_pengeluaran->pengeluaran_februari)}},
                    {{convertk($chart_pengeluaran->pengeluaran_maret)}},
                    {{convertk($chart_pengeluaran->pengeluaran_april)}},
                    {{convertk($chart_pengeluaran->pengeluaran_mei)}},
                    {{convertk($chart_pengeluaran->pengeluaran_juni)}},
                    {{convertk($chart_pengeluaran->pengeluaran_juli)}},
                    {{convertk($chart_pengeluaran->pengeluaran_agustus)}},
                    {{convertk($chart_pengeluaran->pengeluaran_september)}},
                    {{convertk($chart_pengeluaran->pengeluaran_oktober)}},
                    {{convertk($chart_pengeluaran->pengeluaran_november)}},
                    {{convertk($chart_pengeluaran->pengeluaran_desember)}},
                ]
            },

        ]
    };

    var chartOptions = {
        responsive: true,
        legend: {
            position: "top"
        },
        title: {
            display: true,
            text: "Grafik keuangan {{date('Y')}}"
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

    var ctx = document.getElementById("salesanalyticChart").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: "bar",
        data: barChartData,
        options: chartOptions
    });
</script>
<script>
    var oilCanvas = document.getElementById("barChartStacked");

    // Chart.defaults.global.defaultFontFamily = "Lato";
    // Chart.defaults.global.defaultFontSize = 18;

    var keuangan = {
        labels: [
            "Pengeluaran",
            "Pemasukan",        
        ],
        datasets: [
            {
                data: [{{$sum_pengeluaran}}, {{$sum_pemasukan}}],
                backgroundColor: [
                    "#FF6384",
                    "#63FF84",
                    
                ]
            }]
    };

    var options = {
        responsive: true,
        legend: {
            position: "bottom"
        },
        title: {
            display: true,
            text: "Chart keuangan bulan ini"
        },
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: keuangan,
        options: options
    });
</script>