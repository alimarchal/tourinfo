<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
            <h2 class="font-bold text-2xl lg:text-3xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->format('M d, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-4 sm:py-6 lg:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 lg:space-y-8">

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 lg:gap-6">
                <!-- Total Trips Card -->
                <div
                    class="group bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium opacity-90 mb-1">Total Trips</h4>
                            <p class="text-2xl lg:text-3xl font-bold">{{ number_format($totalTrips) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl p-3 group-hover:bg-opacity-30 transition-all">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div
                    class="group bg-gradient-to-br from-emerald-500 via-emerald-600 to-emerald-700 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium opacity-90 mb-1">Total Revenue</h4>
                            <p class="text-xl lg:text-2xl font-bold">Rs. {{ number_format($totalRevenue, 0) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl p-3 group-hover:bg-opacity-30 transition-all">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Expenses Card -->
                <div
                    class="group bg-gradient-to-br from-red-500 via-red-600 to-red-700 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium opacity-90 mb-1">Total Expenses</h4>
                            <p class="text-xl lg:text-2xl font-bold">Rs. {{ number_format($totalExpenses, 0) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl p-3 group-hover:bg-opacity-30 transition-all">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Profit Card -->
                <div
                    class="group bg-gradient-to-br from-purple-500 via-purple-600 to-purple-700 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium opacity-90 mb-1">Total Profit</h4>
                            <p class="text-xl lg:text-2xl font-bold">Rs. {{ number_format($totalProfit, 0) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl p-3 group-hover:bg-opacity-30 transition-all">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Profit Margin Card -->
                <div
                    class="group bg-gradient-to-br from-amber-500 via-amber-600 to-amber-700 text-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium opacity-90 mb-1">Profit Margin</h4>
                            <p class="text-2xl lg:text-3xl font-bold">{{ $avgProfitMargin }}%</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-xl p-3 group-hover:bg-opacity-30 transition-all">
                            <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Charts Row 1 -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8">
                <!-- Tour Type Distribution -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Tour Type
                            Distribution</h3>
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                    </div>
                    <div id="tourTypeChart" class="h-[280px] lg:h-[320px]"></div>
                </div>

                <!-- Booking Status -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Booking Status</h3>
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    </div>
                    <div id="bookingStatusChart" class="h-[280px] lg:h-[320px]"></div>
                </div>
            </div>

            <!-- Monthly Trends Chart -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2 sm:mb-0">
                        Monthly Trends ({{ date('Y') }})
                    </h3>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Revenue & Expenses</span>
                    </div>
                </div>
                <div id="monthlyTrendsChart" class="h-[350px] lg:h-[450px]"></div>
            </div>

            <!-- Agent Performance -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2 sm:mb-0">Agent
                        Performance</h3>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Sales & Performance</span>
                    </div>
                </div>
                <div id="agentChart" class="h-[400px] lg:h-[550px]"></div>
            </div>
            <!-- Bottom Row - Recent Activity & Top Tours -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8">
                <!-- Recent Trips -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Recent Trips</h3>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Live Updates</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentTrips as $trip)
                            <div
                                class="group flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-xl transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                                        {{ $trip->trip_name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        <span class="font-medium">{{ $trip->guest_name }}</span> •
                                        <span>{{ $trip->agent_name }}</span>
                                    </p>
                                </div>
                                <div class="text-right ml-4 flex-shrink-0">
                                    <p class="font-bold text-emerald-600 dark:text-emerald-400">Rs.
                                        {{ number_format($trip->profit, 0) }}</p>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium mt-1 {{ $trip->tour_type == 'Domestic' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                        {{ $trip->tour_type ?? 'Not Set' }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 mt-2">No recent trips found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Top Performing Tours -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Top Performing Tours
                        </h3>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">By Profit</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($topTours as $index => $tour)
                            <div
                                class="group flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-xl transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center flex-1 min-w-0">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-4 flex-shrink-0">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                                            {{ \Illuminate\Support\Str::limit($tour->trip_name, 25) }}
                                        </p>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">
                                            @if($tour->tour_type)
                                                <span
                                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $tour->tour_type == 'Domestic' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                                    {{ $tour->tour_type }}
                                                </span>
                                            @endif
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $tour->booking_status == 'Booked' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                                {{ $tour->booking_status }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right ml-4 flex-shrink-0">
                                    <p class="font-bold text-emerald-600 dark:text-emerald-400">Rs.
                                        {{ number_format($tour->profit, 0) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 mt-2">No tours found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Tour Type Distribution (Donut Chart)
            var tourTypeOptions = {
                series: @json($tourTypeStats->pluck('count')),
                chart: {
                    type: 'donut',
                    height: 320,
                    fontFamily: 'Inter, sans-serif',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                    }
                },
                labels: @json($tourTypeStats->pluck('tour_type')),
                colors: ['#10B981', '#3B82F6'],
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontWeight: 500,
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 6
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '16px',
                                    fontWeight: 600
                                },
                                value: {
                                    show: true,
                                    fontSize: '24px',
                                    fontWeight: 700,
                                    formatter: function (val) {
                                        return val
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: false,
                                    label: 'Total',
                                    fontSize: '16px',
                                    fontWeight: 600,
                                    color: '#374151',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " trips"
                        }
                    }
                },
                responsive: [{
                    breakpoint: 640,
                    options: {
                        chart: {
                            height: 280
                        },
                        legend: {
                            position: 'bottom',
                            fontSize: '12px'
                        }
                    }
                }]
            };

            var tourTypeChart = new ApexCharts(document.querySelector("#tourTypeChart"), tourTypeOptions);
            tourTypeChart.render();

            // Booking Status Chart (Pie Chart)
            var bookingStatusOptions = {
                series: @json($bookingStatusStats->pluck('count')),
                chart: {
                    type: 'pie',
                    height: 320,
                    fontFamily: 'Inter, sans-serif',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                    }
                },
                labels: @json($bookingStatusStats->pluck('booking_status')),
                colors: ['#F59E0B', '#10B981'],
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontWeight: 500,
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 6
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return opts.w.config.series[opts.seriesIndex]
                    },
                    style: {
                        fontSize: '14px',
                        fontWeight: 600
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " bookings"
                        }
                    }
                },
                responsive: [{
                    breakpoint: 640,
                    options: {
                        chart: {
                            height: 280
                        },
                        legend: {
                            position: 'bottom',
                            fontSize: '12px'
                        },
                        dataLabels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    }
                }]
            };

            var bookingStatusChart = new ApexCharts(document.querySelector("#bookingStatusChart"), bookingStatusOptions);
            bookingStatusChart.render();

            // Monthly Trends Chart
            var monthlyTrendsOptions = {
                series: [{
                    name: 'Revenue',
                    type: 'column',
                    data: @json($monthlyTrends->pluck('total_revenue'))
                }, {
                    name: 'Expenses',
                    type: 'column',
                    data: @json($monthlyTrends->pluck('total_expenses'))
                }, {
                    name: 'Profit',
                    type: 'line',
                    data: @json($monthlyTrends->pluck('total_profit'))
                }, {
                    name: 'Trips',
                    type: 'line',
                    data: @json($monthlyTrends->pluck('total_trips'))
                }],
                chart: {
                    height: 450,
                    type: 'line',
                    stacked: false,
                    fontFamily: 'Inter, sans-serif',
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: true,
                            zoomin: true,
                            zoomout: true,
                            pan: true,
                            reset: true
                        }
                    },
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '60%',
                        endingShape: 'rounded',
                        borderRadius: 4
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [0, 0, 4, 4],
                    curve: 'smooth'
                },
                xaxis: {
                    categories: @json($monthlyTrends->map(function ($item) {
                        return \Carbon\Carbon::parse($item->month)->format('M');
                    })),
                    labels: {
                        style: {
                            fontSize: '12px',
                            fontWeight: 500
                        }
                    }
                },
                yaxis: [
                    {
                        title: {
                            text: 'Amount (PKR)',
                            style: {
                                fontSize: '14px',
                                fontWeight: 600
                            }
                        },
                        labels: {
                            formatter: function (val) {
                                return "Rs. " + val.toFixed(0);
                            }
                        }
                    },
                    {
                        opposite: true,
                        title: {
                            text: 'Number of Trips',
                            style: {
                                fontSize: '14px',
                                fontWeight: 600
                            }
                        },
                        labels: {
                            formatter: function (val) {
                                return val.toFixed(0);
                            }
                        }
                    }
                ],
                colors: ['#10B981', '#EF4444', '#8B5CF6', '#F59E0B'],
                legend: {
                    position: 'top',
                    fontSize: '14px',
                    fontWeight: 500,
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 6
                    }
                },
                fill: {
                    opacity: [0.85, 0.85, 1, 1]
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '70%'
                            }
                        },
                        legend: {
                            fontSize: '12px'
                        }
                    }
                }]
            };

            var monthlyTrendsChart = new ApexCharts(document.querySelector("#monthlyTrendsChart"), monthlyTrendsOptions);
            monthlyTrendsChart.render();

            // Agent Performance Chart
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
                        height: 550,
                        type: 'line',
                        stacked: false,
                        fontFamily: 'Inter, sans-serif',
                        toolbar: {
                            show: true,
                            tools: {
                                download: true,
                                selection: true,
                                zoom: true,
                                zoomin: true,
                                zoomout: true,
                                pan: true,
                                reset: true
                            }
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800,
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '65%',
                            endingShape: 'rounded',
                            borderRadius: 6
                        }
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
                            style: {
                                fontSize: '12px',
                                fontWeight: 500
                            }
                        }
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Amount (PKR)',
                                style: {
                                    fontSize: '14px',
                                    fontWeight: 600
                                }
                            },
                            labels: {
                                formatter: function (val) {
                                    return "Rs. " + val.toFixed(0);
                                }
                            }
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Number of Trips',
                                style: {
                                    fontSize: '14px',
                                    fontWeight: 600
                                }
                            },
                            labels: {
                                formatter: function (val) {
                                    return val.toFixed(0);
                                }
                            }
                        }
                    ],
                    colors: ['#4299E1', '#48BB78', '#ECC94B'],
                    legend: {
                        position: 'top',
                        fontSize: '14px',
                        fontWeight: 500,
                        markers: {
                            width: 12,
                            height: 12,
                            radius: 6
                        }
                    },
                    fill: {
                        opacity: [0.85, 0.85, 1]
                    },
                    markers: {
                        size: 6,
                        strokeColors: '#fff',
                        strokeWidth: 2,
                        hover: {
                            size: 8
                        }
                    },
                    responsive: [{
                        breakpoint: 768,
                        options: {
                            chart: {
                                height: 400
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: '75%'
                                }
                            },
                            legend: {
                                fontSize: '12px'
                            },
                            xaxis: {
                                labels: {
                                    rotate: -90,
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            }
                        }
                    }]
                };

                var agentChart = new ApexCharts(document.querySelector("#agentChart"), agentOptions);
                agentChart.render();

                // Add responsive behavior for window resize
                window.addEventListener('resize', function() {
                    setTimeout(() => {
                        tourTypeChart.updateOptions({
                            chart: {
                                height: window.innerWidth < 640 ? 280 : 320
                            }
                        });
                        bookingStatusChart.updateOptions({
                            chart: {
                                height: window.innerWidth < 640 ? 280 : 320
                            }
                        });
                        monthlyTrendsChart.updateOptions({
                            chart: {
                                height: window.innerWidth < 768 ? 350 : 450
                            }
                        });
                        agentChart.updateOptions({
                            chart: {
                                height: window.innerWidth < 768 ? 400 : 550
                            }
                        });
                    }, 100);
                });
            });
        </script>

        <style>
            /* Custom scrollbar for better aesthetics */
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            
            ::-webkit-scrollbar-track {
                background: #f1f5f9;
                border-radius: 3px;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* Dark mode scrollbar */
            .dark ::-webkit-scrollbar-track {
                background: #374151;
            }
            
            .dark ::-webkit-scrollbar-thumb {
                background: #6b7280;
            }
            
            .dark ::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }

            /* Custom animations */
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-slide-in-up {
                animation: slideInUp 0.6s ease-out;
            }

            /* Gradient background for dark mode */
            .dark body {
                background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            }

            /* Enhanced hover effects */
            .group:hover .group-hover\:scale-105 {
                transform: scale(1.05);
            }

            /* ApexCharts custom styling */
            .apexcharts-toolbar {
                border-radius: 8px !important;
                background: rgba(255, 255, 255, 0.9) !important;
                backdrop-filter: blur(10px) !important;
                border: 1px solid rgba(229, 231, 235, 0.5) !important;
            }

            .dark .apexcharts-toolbar {
                background: rgba(31, 41, 55, 0.9) !important;
                border: 1px solid rgba(75, 85, 99, 0.5) !important;
            }

            /* Loading animation for charts */
            .apexcharts-canvas {
                opacity: 0;
                animation: fadeInChart 1s ease-in-out 0.5s forwards;
            }

            @keyframes fadeInChart {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            /* Card hover effects */
            .bg-white:hover,
            .dark .dark\:bg-gray-800:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            .dark .bg-white:hover,
            .dark .dark\:bg-gray-800:hover {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.25), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            }

            /* Mobile optimization */
            @media (max-width: 640px) {
                .apexcharts-legend {
                    flex-wrap: wrap !important;
                }
                
                .apexcharts-legend-series {
                    margin: 2px 8px !important;
                }
            }

            /* Print styles */
            @media print {
                .apexcharts-toolbar {
                    display: none !important;
                }
                
                .bg-gradient-to-br,
                .bg-gradient-to-r {
                    background: #6b7280 !important;
                    -webkit-print-color-adjust: exact;
                }
            }
        </style>
    @endpush
</x-app-layout>