<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
            <h2 class="font-bold text-2xl lg:text-3xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Dashboard Analytics') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->format('M d, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-4 sm:py-6 lg:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 lg:space-y-8">

            <!-- Date Filter Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col lg:flex-row gap-4 items-end">
                    <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="date_field" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Date Field
                            </label>
                            <select name="date_field" id="date_field" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="booking_date" {{ $dateField == 'booking_date' ? 'selected' : '' }}>Booking Date</option>
                                <option value="check_in_date" {{ $dateField == 'check_in_date' ? 'selected' : '' }}>Check-in Date</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="start_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Start Date
                            </label>
                            <input type="date" name="start_date" id="start_date" value="{{ $startDate }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        </div>
                        
                        <div>
                            <label for="end_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                End Date
                            </label>
                            <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        </div>
                    </div>
                    
                    <div class="flex gap-3">
                        <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                            </svg>
                            Filter
                        </button>
                        
                        <a href="{{ route('dashboard') }}" 
                            class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-500 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 lg:gap-6">
                <!-- Total Trips Card -->
                <div class="card-loading group bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white rounded-xl transition-all duration-300 p-5 hover:scale-105">
                    <div class="flex items-center justify-between h-full">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-medium opacity-90 mb-1 truncate">Total Trips</h4>
                            <p class="text-xl lg:text-2xl font-bold truncate">{{ number_format($totalTrips) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-2 ml-3 flex-shrink-0">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div class="card-loading group bg-gradient-to-br from-emerald-500 via-emerald-600 to-emerald-700 text-white rounded-xl transition-all duration-300 p-5 hover:scale-105">
                    <div class="flex items-center justify-between h-full">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-medium opacity-90 mb-1 truncate">Total Revenue</h4>
                            <p class="text-lg lg:text-xl font-bold truncate">Rs. {{ number_format($totalRevenue/1000, 0) }}K</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-2 ml-3 flex-shrink-0">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Expenses Card -->
                <div class="card-loading group bg-gradient-to-br from-red-500 via-red-600 to-red-700 text-white rounded-xl transition-all duration-300 p-5 hover:scale-105">
                    <div class="flex items-center justify-between h-full">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-medium opacity-90 mb-1 truncate">Total Expenses</h4>
                            <p class="text-lg lg:text-xl font-bold truncate">Rs. {{ number_format($totalExpenses/1000, 0) }}K</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-2 ml-3 flex-shrink-0">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Profit Card -->
                <div class="card-loading group bg-gradient-to-br from-purple-500 via-purple-600 to-purple-700 text-white rounded-xl transition-all duration-300 p-5 hover:scale-105">
                    <div class="flex items-center justify-between h-full">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-medium opacity-90 mb-1 truncate">Total Profit</h4>
                            <p class="text-lg lg:text-xl font-bold truncate">Rs. {{ number_format($totalProfit/1000, 0) }}K</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-2 ml-3 flex-shrink-0">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Profit Margin Card -->
                <div class="card-loading group bg-gradient-to-br from-amber-500 via-amber-600 to-amber-700 text-white rounded-xl transition-all duration-300 p-5 hover:scale-105 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center justify-between h-full">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-medium opacity-90 mb-1 truncate">Profit Margin</h4>
                            <p class="text-xl lg:text-2xl font-bold truncate">{{ $avgProfitMargin }}%</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-2 ml-3 flex-shrink-0">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row 1 -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8">
                <!-- Tour Type Distribution -->
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Tour Type Distribution</h3>
                        <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    </div>
                    <div id="tourTypeChart" class="h-[300px] lg:h-[350px]"></div>
                </div>

                <!-- Booking Status -->
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Booking Status</h3>
                        <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                    </div>
                    <div id="bookingStatusChart" class="h-[300px] lg:h-[350px]"></div>
                </div>
            </div>

            <!-- Monthly Trends Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2 sm:mb-0">
                            Monthly Trends Analysis
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            From {{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse"></div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Revenue & Performance</span>
                    </div>
                </div>
                <div id="monthlyTrendsChart" class="h-[400px] lg:h-[500px]"></div>
            </div>

            <!-- Calendar Performance View -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">
                            Monthly Performance Calendar
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Select a month to view agent performance details
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 mt-4 lg:mt-0">
                        <input type="month" id="monthSelector" 
                            value="{{ now()->format('Y-m') }}"
                            class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button onclick="loadMonthlyData()" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all">
                            Load Data
                        </button>
                    </div>
                </div>
                
                <!-- Monthly Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-4">
                        <h4 class="text-sm font-medium opacity-90">Total Trips</h4>
                        <p id="monthlyTrips" class="text-2xl font-bold">0</p>
                    </div>
                    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-4">
                        <h4 class="text-sm font-medium opacity-90">Total Profit</h4>
                        <p id="monthlyProfit" class="text-2xl font-bold">Rs. 0</p>
                    </div>
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg p-4">
                        <h4 class="text-sm font-medium opacity-90">Top Agent</h4>
                        <p id="topAgent" class="text-lg font-bold">-</p>
                    </div>
                </div>

                <!-- Monthly Agent Performance Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Agent</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 dark:text-gray-100">Trips</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 dark:text-gray-100">Sales</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 dark:text-gray-100">Profit</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 dark:text-gray-100">Avg. Profit</th>
                            </tr>
                        </thead>
                        <tbody id="monthlyAgentTable" class="divide-y divide-gray-200 dark:divide-gray-600">
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Select a month to view agent performance
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Agent Performance -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2 sm:mb-0">
                            Agent Performance Analytics
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Sales performance and trip statistics by agent
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Sales & Trips</span>
                    </div>
                </div>
                <div id="agentChart" class="h-[450px] lg:h-[600px]"></div>
            </div>

            <!-- Bottom Row - Recent Activity & Top Tours -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8">
                <!-- Recent Trips -->
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Recent Trips</h3>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Live Updates</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentTrips as $trip)
                            <div class="group flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                                        {{ $trip->trip_name }}
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        <span class="font-medium">{{ $trip->guest_name }}</span> •
                                        <span>{{ $trip->agent_name }}</span>
                                    </p>
                                </div>
                                <div class="text-right ml-4 flex-shrink-0">
                                    <p class="font-bold text-emerald-600 dark:text-emerald-400">
                                        Rs. {{ number_format($trip->profit, 0) }}
                                    </p>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium mt-1 {{ $trip->tour_type == 'Domestic' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200' : ($trip->tour_type == 'International' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200') }}">
                                        {{ $trip->tour_type ?? 'Not Set' }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 mt-2">No trips found in selected date range.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Top Performing Tours -->
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 lg:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-800 dark:text-gray-200">Top Performing Tours</h3>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">By Profit</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($topTours as $index => $tour)
                            <div class="group flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center flex-1 min-w-0">
                                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-4 flex-shrink-0">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                                            {{ \Illuminate\Support\Str::limit($tour->trip_name, 25) }}
                                        </p>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">
                                            @if($tour->tour_type)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $tour->tour_type == 'Domestic' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                                    {{ $tour->tour_type }}
                                                </span>
                                            @endif
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $tour->booking_status == 'Booked' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                                {{ $tour->booking_status }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right ml-4 flex-shrink-0">
                                    <p class="font-bold text-emerald-600 dark:text-emerald-400">
                                        Rs. {{ number_format($tour->profit, 0) }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 mt-2">No tours found in selected date range.</p>
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
        // Enhanced color schemes
        const colors = {
            primary: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'],
            gradient: ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe'],
            success: '#10B981',
            warning: '#F59E0B',
            danger: '#EF4444',
            info: '#3B82F6'
        };

        // Add loading animations to cards
        function animateCards() {
            const cards = document.querySelectorAll('.card-loading');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        // Start card animations
        animateCards();

        // Tour Type Distribution (Enhanced Donut Chart) - FIXED: 3 colors for all trip types
        var tourTypeOptions = {
            series: @json($tourTypeCollection->pluck('count')),
            chart: {
                type: 'donut',
                height: 350,
                fontFamily: 'Inter, sans-serif',
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1200,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 2,
                    blur: 4,
                    opacity: 0.1
                }
            },
            labels: @json($tourTypeCollection->pluck('tour_type')),
colors: ['#10B981', '#3B82F6', '#F59E0B'],
            legend: {
                position: 'bottom',
                fontSize: '14px',
                fontWeight: 600,
                fontFamily: 'Inter, sans-serif',
                markers: {
                    width: 12,
                    height: 12,
                    radius: 6
                },
                itemMargin: {
                    horizontal: 20,
                    vertical: 5
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
                                fontWeight: 700,
                                color: '#374151'
                            },
                            value: {
                                show: true,
                                fontSize: '28px',
                                fontWeight: 700,
                                color: '#1F2937',
                                formatter: function (val) {
                                    return val
                                }
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total Trips',
                                fontSize: '14px',
                                fontWeight: 600,
                                color: '#6B7280',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 3,
                colors: ['#ffffff']
            },
            tooltip: {
                enabled: true,
                theme: 'dark',
                style: {
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                y: {
                    formatter: function (val, opts) {
                        const tourType = @json($tourTypeCollection);
                        const currentData = tourType[opts.seriesIndex];
                        return `<div class="p-2">
                                    <div class="font-semibold">${val} trips</div>
                                    <div class="text-sm">Revenue: Rs. ${new Intl.NumberFormat().format(currentData.revenue)}</div>
                                    <div class="text-sm">Profit: Rs. ${new Intl.NumberFormat().format(currentData.profit)}</div>
                                </div>`;
                    }
                }
            }
        };

        var tourTypeChart = new ApexCharts(document.querySelector("#tourTypeChart"), tourTypeOptions);
        tourTypeChart.render();

        // Booking Status Chart (Enhanced Pie Chart) - FIXED: 3 colors for all booking statuses
        var bookingStatusOptions = {
            series: @json($bookingStatusCollection->pluck('count')),
            chart: {
                type: 'pie',
                height: 350,
                fontFamily: 'Inter, sans-serif',
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1200,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    }
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 2,
                    blur: 4,
                    opacity: 0.1
                }
            },
            labels: @json($bookingStatusCollection->pluck('booking_status')),
            colors: ['#F59E0B', '#10B981', '#6B7280'], // Added third color for "Not Set"
            legend: {
                position: 'bottom',
                fontSize: '14px',
                fontWeight: 600,
                fontFamily: 'Inter, sans-serif',
                markers: {
                    width: 12,
                    height: 12,
                    radius: 6
                },
                itemMargin: {
                    horizontal: 20,
                    vertical: 5
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '14px',
                    fontWeight: 600,
                    colors: ['#ffffff']
                },
                formatter: function (val, opts) {
                    return opts.w.config.series[opts.seriesIndex]
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 1,
                    opacity: 0.8
                }
            },
            stroke: {
                width: 3,
                colors: ['#ffffff']
            },
            tooltip: {
                enabled: true,
                theme: 'dark',
                style: {
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                y: {
                    formatter: function (val, opts) {
                        const statusData = @json($bookingStatusCollection);
                        const currentData = statusData[opts.seriesIndex];
                        return `<div class="p-2">
                                    <div class="font-semibold">${val} bookings</div>
                                    <div class="text-sm">Revenue: Rs. ${new Intl.NumberFormat().format(currentData.revenue)}</div>
                                </div>`;
                    }
                }
            }
        };

        var bookingStatusChart = new ApexCharts(document.querySelector("#bookingStatusChart"), bookingStatusOptions);
        bookingStatusChart.render();

        // Enhanced Monthly Trends Chart
        var monthlyTrendsOptions = {
            series: [{
                name: 'Revenue',
                type: 'column',
                data: @json($monthlyData->pluck('total_revenue'))
            }, {
                name: 'Profit',
                type: 'column',
                data: @json($monthlyData->pluck('total_profit'))
            }, {
                name: 'Trips',
                type: 'line',
                data: @json($monthlyData->pluck('total_trips'))
            }],
            chart: {
                height: 500,
                type: 'line',
                stacked: false,
                fontFamily: 'Inter, sans-serif',
                background: 'transparent',
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                    tools: {
                        download: true,
                        selection: true,
                        zoom: true,
                        zoomin: true,
                        zoomout: true,
                        pan: true,
                        reset: true
                    },
                    export: {
                        csv: {
                            filename: 'monthly-trends'
                        },
                        svg: {
                            filename: 'monthly-trends'
                        },
                        png: {
                            filename: 'monthly-trends'
                        }
                    }
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1000,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    }
                },
                dropShadow: {
                    enabled: true,
                    enabledOnSeries: [2],
                    top: 3,
                    left: 2,
                    blur: 4,
                    opacity: 0.1
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '60%',
                    endingShape: 'rounded',
                    borderRadius: 6,
                    borderRadiusApplication: 'end',
                    borderRadiusWhenStacked: 'last'
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
                categories: @json($monthlyData->map(function ($item) {
                    return \Carbon\Carbon::parse($item->month)->format('M Y');
                })),
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600,
                        colors: '#6B7280'
                    },
                    rotate: -45
                },
                axisBorder: {
                    show: true,
                    color: '#E5E7EB'
                },
                axisTicks: {
                    show: true,
                    color: '#E5E7EB'
                }
            },
            yaxis: [
                {
                    title: {
                        text: 'Amount (PKR)',
                        style: {
                            fontSize: '14px',
                            fontWeight: 600,
                            color: '#374151'
                        }
                    },
                    labels: {
                        style: {
                            colors: '#6B7280',
                            fontSize: '12px',
                            fontWeight: 500
                        },
                        formatter: function (val) {
                            return "Rs. " + new Intl.NumberFormat().format(val);
                        }
                    }
                },
                {
                    opposite: true,
                    title: {
                        text: 'Number of Trips',
                        style: {
                            fontSize: '14px',
                            fontWeight: 600,
                            color: '#374151'
                        }
                    },
                    labels: {
                        style: {
                            colors: '#6B7280',
                            fontSize: '12px',
                            fontWeight: 500
                        },
                        formatter: function (val) {
                            return val.toFixed(0);
                        }
                    }
                }
            ],
            colors: ['#10B981', '#8B5CF6', '#F59E0B'],
            legend: {
                position: 'top',
                fontSize: '14px',
                fontWeight: 600,
                fontFamily: 'Inter, sans-serif',
                markers: {
                    width: 12,
                    height: 12,
                    radius: 6
                },
                itemMargin: {
                    horizontal: 15,
                    vertical: 5
                }
            },
            fill: {
                opacity: [0.85, 0.85, 1],
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.2,
                    gradientToColors: ['#34D399', '#A78BFA', '#FBBF24'],
                    inverseColors: false,
                    opacityFrom: 0.85,
                    opacityTo: 0.55,
                    stops: [0, 100]
                }
            },
            grid: {
                show: true,
                borderColor: '#E5E7EB',
                strokeDashArray: 3,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                size: [0, 0, 6],
                strokeColors: '#fff',
                strokeWidth: 2,
                hover: {
                    size: 8
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                theme: 'dark',
                style: {
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                x: {
                    show: true,
                    format: 'MMM yyyy'
                },
                y: [{
                    formatter: function (val) {
                        return "Rs. " + new Intl.NumberFormat().format(val);
                    }
                }, {
                    formatter: function (val) {
                        return "Rs. " + new Intl.NumberFormat().format(val);
                    }
                }, {
                    formatter: function (val) {
                        return val + " trips";
                    }
                }]
            }
        };

        var monthlyTrendsChart = new ApexCharts(document.querySelector("#monthlyTrendsChart"), monthlyTrendsOptions);
        monthlyTrendsChart.render();

        // Enhanced Agent Performance Bar Chart with data validation
        var agentData = @json($agentReport);
        
        // Validate and fix data client-side
        var salesData = [];
        var profitData = [];
        var tripsData = [];
        var agentNames = [];
        
        agentData.forEach(function(agent) {
            var sales = parseFloat(agent.total_sales) || 0;
            var profit = parseFloat(agent.total_profit) || 0;
            var trips = parseInt(agent.total_trips) || 0;
            
            // Ensure profit never exceeds sales
            if (profit > sales && sales > 0) {
                profit = sales; // Cap profit at sales
                console.warn('Data corrected for agent:', agent.agent_name, 'Original profit:', agent.total_profit, 'Corrected to:', profit);
            }
            
            salesData.push(sales);
            profitData.push(profit);
            tripsData.push(trips * 10000); // Scale for visibility
            agentNames.push(agent.agent_name);
        });

        var agentOptions = {
            series: [{
                name: 'Total Sales',
                data: salesData
            }, {
                name: 'Total Profit',
                data: profitData
            }, {
                name: 'Total Trips',
                data: tripsData
            }],
            chart: {
                type: 'bar',
                height: 600,
                fontFamily: 'Inter, sans-serif',
                background: 'transparent',
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
                    },
                    export: {
                        csv: {
                            filename: 'agent-performance'
                        },
                        svg: {
                            filename: 'agent-performance'
                        },
                        png: {
                            filename: 'agent-performance'
                        }
                    }
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1000,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    }
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '65%',
                    borderRadius: 5,
                    borderRadiusApplication: 'end'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: agentNames,
                labels: {
                    rotate: -45,
                    rotateAlways: true,
                    style: {
                        fontSize: '11px',
                        fontWeight: 600,
                        colors: '#6B7280'
                    },
                    trim: true,
                    maxHeight: 120,
                    hideOverlappingLabels: true,
                    showDuplicates: false
                },
                axisBorder: {
                    show: true,
                    color: '#E5E7EB'
                },
                axisTicks: {
                    show: true,
                    color: '#E5E7EB'
                }
            },
            yaxis: {
                title: {
                    text: 'Amount (PKR)',
                    style: {
                        fontSize: '14px',
                        fontWeight: 600,
                        color: '#374151'
                    }
                },
                labels: {
                    style: {
                        colors: '#6B7280',
                        fontSize: '12px',
                        fontWeight: 500
                    },
                    formatter: function (val) {
                        return "Rs. " + new Intl.NumberFormat().format(val);
                    }
                }
            },
            colors: ['#4299E1', '#48BB78', '#ECC94B'],
            legend: {
                position: 'top',
                fontSize: '14px',
                fontWeight: 600,
                fontFamily: 'Inter, sans-serif',
                markers: {
                    width: 12,
                    height: 12,
                    radius: 6
                },
                itemMargin: {
                    horizontal: 15,
                    vertical: 5
                }
            },
            fill: {
                opacity: 0.85
            },
            grid: {
                show: true,
                borderColor: '#E5E7EB',
                strokeDashArray: 3,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            tooltip: {
                theme: 'dark',
                style: {
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                y: {
                    formatter: function (val, opts) {
                        if (opts.seriesIndex === 2) {
                            // For trips series, divide by scaling factor
                            return Math.round(val / 10000) + " trips";
                        }
                        return "Rs. " + new Intl.NumberFormat().format(val);
                    }
                }
            }
        };

        var agentChart = new ApexCharts(document.querySelector("#agentChart"), agentOptions);
        agentChart.render();

        // Monthly Data Loading Function
        window.loadMonthlyData = function() {
            const selectedMonth = document.getElementById('monthSelector').value;
            if (!selectedMonth) return;
            
            const dateField = document.getElementById('date_field').value;
            
            document.getElementById('monthlyTrips').textContent = 'Loading...';
            document.getElementById('monthlyProfit').textContent = 'Loading...';
            document.getElementById('topAgent').textContent = 'Loading...';
            
            fetch(`{{ route('dashboard') }}?month=${selectedMonth}&date_field=${dateField}&ajax=1`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('monthlyTrips').textContent = data.totalTrips || 0;
                    document.getElementById('monthlyProfit').textContent = 'Rs. ' + (data.totalProfit ? new Intl.NumberFormat().format(data.totalProfit) : '0');
                    document.getElementById('topAgent').textContent = data.topAgent || 'No Data';
                    
                    const tableBody = document.getElementById('monthlyAgentTable');
                    if (data.agentData && data.agentData.length > 0) {
                        tableBody.innerHTML = data.agentData.map((agent, index) => `
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                            ${index + 1}
                                        </div>
                                        <span class="font-medium text-gray-900 dark:text-gray-100">${agent.agent_name}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center font-semibold text-blue-600">${agent.total_trips}</td>
                                <td class="px-4 py-3 text-center font-semibold text-green-600">Rs. ${new Intl.NumberFormat().format(agent.total_sales)}</td>
                                <td class="px-4 py-3 text-center font-semibold text-purple-600">Rs. ${new Intl.NumberFormat().format(agent.total_profit)}</td>
                                <td class="px-4 py-3 text-center font-semibold text-orange-600">Rs. ${new Intl.NumberFormat().format(agent.avg_profit)}</td>
                            </tr>
                        `).join('');
                    } else {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    No data found for selected month
                                </td>
                            </tr>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error loading monthly data:', error);
                    document.getElementById('monthlyTrips').textContent = 'Error';
                    document.getElementById('monthlyProfit').textContent = 'Error';
                    document.getElementById('topAgent').textContent = 'Error';
                });
        };

        document.getElementById('date_field').addEventListener('change', function() {
            loadMonthlyData();
        });

        loadMonthlyData();

        // Enhanced responsive behavior
        window.addEventListener('resize', function() {
            setTimeout(() => {
                const isMobile = window.innerWidth < 640;
                const isTablet = window.innerWidth < 1024;
                
                const responsiveHeight = {
                    small: isMobile ? 280 : 350,
                    medium: isMobile ? 350 : isTablet ? 400 : 500,
                    large: isMobile ? 400 : isTablet ? 500 : 600
                };

                tourTypeChart.updateOptions({
                    chart: { height: responsiveHeight.small }
                });
                
                bookingStatusChart.updateOptions({
                    chart: { height: responsiveHeight.small }
                });
                
                monthlyTrendsChart.updateOptions({
                    chart: { height: responsiveHeight.medium }
                });
                
                agentChart.updateOptions({
                    chart: { height: responsiveHeight.large }
                });
            }, 100);
        });
    });
</script>

    <style>
        /* Enhanced Custom Styles */
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

        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }
        
        .dark ::-webkit-scrollbar-thumb {
            background: #6b7280;
        }
        
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        /* Card loading animations */
        .card-loading {
            transition: all 0.6s ease-out;
        }

        /* Enhanced animations */
        @keyframes fadeInChart {
            from { 
                opacity: 0;
                transform: translateY(10px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .apexcharts-canvas {
            opacity: 0;
            animation: fadeInChart 0.8s ease-in-out 0.2s forwards;
        }

        /* Clean ApexCharts styling */
        .apexcharts-toolbar {
            border-radius: 8px !important;
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(8px) !important;
            border: 1px solid rgba(229, 231, 235, 0.5) !important;
        }

        .dark .apexcharts-toolbar {
            background: rgba(31, 41, 55, 0.9) !important;
            border: 1px solid rgba(75, 85, 99, 0.5) !important;
        }

        /* Hover effects without excessive shadows */
        .bg-white:hover,
        .dark .dark\:bg-gray-800:hover {
            transform: translateY(-1px);
        }

        /* Form enhancements */
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .apexcharts-legend {
                flex-wrap: wrap !important;
                justify-content: center !important;
            }
            
            .apexcharts-legend-series {
                margin: 2px 6px !important;
            }
        }

        /* Print optimizations */
        @media print {
            .apexcharts-toolbar {
                display: none !important;
            }
            
            .bg-gradient-to-br,
            .bg-gradient-to-r {
                background: #6b7280 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
    @endpush
</x-app-layout>