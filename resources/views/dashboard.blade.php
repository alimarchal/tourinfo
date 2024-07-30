<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Monthly Profit Report</h3>
                        <div id="chart" class="h-[400px]"></div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800">Agent-wise Report</h3>
                        <div id="agentChart" class="h-[500px]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Monthly Profit Chart
                var options = {
                    series: [{
                        name: "Monthly Profit",
                        data: [@foreach($monthlyProfit as $mp) {{ $mp->total_profit }}, @endforeach]
                    }],
                    chart: {
                        height: 400,
                        type: 'area',
                        fontFamily: 'Inter, sans-serif',
                        toolbar: {
                            show: false
                        }
                    },
                    dataLabels: { enabled: false },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    title: {
                        text: 'Monthly Profit Trend',
                        align: 'left',
                        style: {
                            fontSize: '18px',
                            fontWeight: 'bold',
                            color: '#263238'
                        }
                    },
                    grid: {
                        borderColor: '#e0e0e0',
                        strokeDashArray: 5,
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.9,
                            stops: [0, 90, 100]
                        }
                    },
                    xaxis: {
                        categories: [@foreach($monthlyProfit as $mp) '{{ \Carbon\Carbon::parse($mp->month)->format('M') }}', @endforeach],
                        labels: {
                            style: {
                                colors: '#9e9e9e',
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Profit (PKR)',
                            style: {
                                color: '#9e9e9e'
                            }
                        },
                        labels: {
                            formatter: function(val) {
                                return "PKR " + val.toFixed(0);
                            },
                            style: {
                                colors: '#9e9e9e',
                                fontSize: '12px'
                            }
                        }
                    },
                    theme: {
                        palette: 'palette1'
                    }
                };

                try {
                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                } catch (error) {
                    console.error('Error rendering monthly chart:', error);
                }

                // Agent-wise report chart
                var agentOptions = {
                    series: [{
                        name: 'Total Sales',
                        data: @json($agentReport->pluck('total_sales'))
                    }, {
                        name: 'Total Profit',
                        data: @json($agentReport->pluck('total_profit'))
                    }, {
                        name: 'Total Trips',
                        type: 'line',
                        data: @json($agentReport->pluck('total_trips'))
                    }],
                    chart: {
                        type: 'bar',
                        height: 500,
                        stacked: false,
                        fontFamily: 'Inter, sans-serif',
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded',
                            borderRadius: 4
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: [0, 0, 3],
                        colors: ['transparent', 'transparent', '#FEB019']
                    },
                    xaxis: {
                        categories: @json($agentReport->pluck('agent_name')),
                        labels: {
                            rotate: -45,
                            rotateAlways: true,
                            style: {
                                fontSize: '12px',
                                colors: '#9e9e9e'
                            }
                        }
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Amount (PKR)',
                                style: {
                                    color: '#9e9e9e'
                                }
                            },
                            labels: {
                                formatter: function(val) {
                                    return "PKR " + val.toFixed(0);
                                },
                                style: {
                                    colors: '#9e9e9e',
                                    fontSize: '12px'
                                }
                            }
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Number of Trips',
                                style: {
                                    color: '#9e9e9e'
                                }
                            },
                            labels: {
                                formatter: function(val) {
                                    return val.toFixed(0);
                                },
                                style: {
                                    colors: '#9e9e9e',
                                    fontSize: '12px'
                                }
                            }
                        }
                    ],
                    tooltip: {
                        y: {
                            formatter: function(val, { seriesIndex }) {
                                if (seriesIndex === 2) return val;
                                return "PKR " + parseFloat(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetY: -10
                    },
                    fill: {
                        opacity: [0.85, 0.85, 1]
                    },
                    colors: ['#008FFB', '#00E396', '#FEB019'],
                    title: {
                        text: 'Agent Performance Overview',
                        align: 'left',
                        style: {
                            fontSize: '18px',
                            fontWeight: 'bold',
                            color: '#263238'
                        }
                    },
                    grid: {
                        borderColor: '#e0e0e0',
                        strokeDashArray: 5,
                    }
                };

                try {
                    var agentChart = new ApexCharts(document.querySelector("#agentChart"), agentOptions);
                    agentChart.render();
                } catch (error) {
                    console.error('Error rendering agent chart:', error);
                }
            });
        </script>
    @endpush
</x-app-layout>