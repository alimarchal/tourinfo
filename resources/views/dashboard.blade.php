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
                        type: 'column',
                        data: @json($agentReport->pluck('total_sales'))
                    }, {
                        name: 'Total Profit',
                        type: 'column',
                        data: @json($agentReport->pluck('total_profit'))
                    }, {
                        name: 'Total Trips',
                        type: 'line',
                        data: @json($agentReport->pluck('total_trips'))
                    }],
                    chart: {
                        height: 500,
                        type: 'line',
                        stacked: false,
                        fontFamily: 'Inter, sans-serif',
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800,
                            animateGradually: {
                                enabled: true,
                                delay: 150
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 350
                            }
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
                        width: [0, 0, 4],
                        curve: 'smooth'
                    },
                    xaxis: {
                        categories: @json($agentReport->pluck('agent_name')),
                        labels: {
                            rotate: -45,
                            rotateAlways: true,
                            style: {
                                fontSize: '12px',
                                colors: '#718096',
                                fontWeight: 500
                            }
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Amount (PKR)',
                                style: {
                                    color: '#718096',
                                    fontSize: '14px',
                                    fontWeight: 500
                                }
                            },
                            labels: {
                                formatter: function(val) {
                                    return "PKR " + val.toFixed(0);
                                },
                                style: {
                                    colors: '#718096',
                                    fontSize: '12px'
                                }
                            }
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Number of Trips',
                                style: {
                                    color: '#718096',
                                    fontSize: '14px',
                                    fontWeight: 500
                                }
                            },
                            labels: {
                                formatter: function(val) {
                                    return val.toFixed(0);
                                },
                                style: {
                                    colors: '#718096',
                                    fontSize: '12px'
                                }
                            }
                        }
                    ],
                    tooltip: {
                        shared: true,
                        intersect: false,
                        y: {
                            formatter: function(val, { seriesIndex }) {
                                if (seriesIndex === 2) return val;
                                return "PKR " + parseFloat(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            }
                        },
                        theme: 'dark',
                        style: {
                            fontSize: '12px'
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetY: -10,
                        itemMargin: {
                            horizontal: 10
                        },
                        labels: {
                            colors: '#4A5568'
                        }
                    },
                    fill: {
                        opacity: [0.85, 0.85, 1],
                        gradient: {
                            inverseColors: false,
                            shade: 'light',
                            type: "vertical",
                            opacityFrom: 0.85,
                            opacityTo: 0.55,
                            stops: [0, 100, 100, 100]
                        }
                    },
                    colors: ['#4299E1', '#48BB78', '#ECC94B'],
                    title: {
                        text: 'Agent Performance Overview',
                        align: 'left',
                        style: {
                            fontSize: '20px',
                            fontWeight: 'bold',
                            color: '#2D3748'
                        }
                    },
                    grid: {
                        borderColor: '#E2E8F0',
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },
                        yaxis: {
                            lines: {
                                show: true
                            }
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 10
                        }
                    },
                    markers: {
                        size: 6,
                        strokeColors: '#fff',
                        strokeWidth: 2,
                        hover: {
                            size: 8
                        }
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