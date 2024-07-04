<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
                Trip List
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('trip.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-white text-indigo-600 border border-indigo-600 text-xs font-semibold uppercase rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Trip
                </a>
                <button id="filter-toggle"
                    class="inline-flex items-center px-4 py-2 bg-white text-gray-600 border border-gray-600 text-xs font-semibold uppercase rounded-md hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 012 0h14a1 1 0 110 2H5a1 1 0 01-2 0H3zm0 8a1 1 0 012 0h14a1 1 0 110 2H5a1 1 0 01-2 0H3zm0 8a1 1 0 012 0h14a1 1 0 110 2H5a1 1 0 01-2 0H3z" />
                    </svg>
                </button>
                @include('back-navigation')
            </div>
        </div>
        <!-- Filter Form -->
        <div id="filter-form"
            class="p-4 bg-gray-200 dark:bg-gray-700 rounded-md mb-4 hidden">
            <form action="{{ route('trip.index') }}" method="GET">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <label for="search"
                            class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="search" id="search"
                            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full"
                            placeholder="Search trips..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <label for="filter_trip_name"
                            class="block text-sm font-medium text-gray-700">Trip Name</label>
                        <input type="text" name="filter_trip_name" id="filter_trip_name"
                            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full"
                            placeholder="Filter by trip name..."
                            value="{{ request('filter_trip_name') }}">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <label for="filter_guest_name"
                            class="block text-sm font-medium text-gray-700">Guest Name</label>
                        <input type="text" name="filter_guest_name" id="filter_guest_name"
                            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full"
                            placeholder="Filter by guest name..."
                            value="{{ request('filter_guest_name') }}">
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/4">
                        <label for="filter_booking_status"
                            class="block text-sm font-medium text-gray-700">Booking Status</label>
                        <select name="filter_booking_status" id="filter_booking_status"
                            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
                            <option value="">Select booking status</option>
                            <option value="booked"
                                {{ request('filter_booking_status') === 'booked' ? 'selected' : '' }}>
                                Booked</option>
                            <option value="cancelled"
                                {{ request('filter_booking_status') === 'cancelled' ? 'selected' : '' }}>
                                Cancelled</option>
                            <option value="pending"
                                {{ request('filter_booking_status') === 'pending' ? 'selected' : '' }}>
                                Pending</option>
                        </select>
                    </div>
                    <div class="w-full flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Apply Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4" />
                <div class="pb-2 lg:pb-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="overflow-x-auto">
                        @if ($trips->isNotEmpty())
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-800 text-white uppercase text-xs">
                                        <th class="py-3 px-6 text-left">ID</th>
                                        <th class="py-3 px-6 text-left">Trip Name</th>
                                        <th class="py-3 px-6 text-left">Guest Name</th>
                                        <th class="py-3 px-6 text-left">Guest Email</th>
                                        <th class="py-3 px-6 text-left">Guest Contact</th>
                                        <th class="py-3 px-6 text-left">Check-in Date</th>
                                        <th class="py-3 px-6 text-left">Booking Date</th>
                                        <th class="py-3 px-6 text-left">Total Cost</th>
                                        <th class="py-3 px-6 text-left">Total Expenses</th>
                                        <th class="py-3 px-6 text-left">Profit</th>
                                        <th class="py-3 px-6 text-left">Agent Name</th>
                                        <th class="py-3 px-6 text-left">Booking Status</th>
                                        <th class="py-3 px-6 text-left">Attachment</th>
                                        <th class="py-3 px-6 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm">
                                    @foreach ($trips as $trip)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="py-3 px-6 text-left">{{ $trip->id }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->trip_name }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->guest_name }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->guest_email }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->guest_contact }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->check_in_date }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->booking_date }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->total_cost }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->total_expenses }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->profit }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->agent_name }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->booking_status }}</td>
                                            <td class="py-3 px-6 text-left">{{ $trip->path_attachment }}</td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center space-x-4">
                                                    <a href="{{ route('trip.edit', $trip->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 dark:text-gray-300 dark:hover:text-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('trip.destroy', $trip->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this trip?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900 dark:text-gray-300 dark:hover:text-gray-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="p-4 text-gray-700">No trips found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const filterToggle = document.getElementById('filter-toggle');
        const filterForm = document.getElementById('filter-form');

        filterToggle.addEventListener('click', function() {
            filterForm.classList.toggle('hidden');
        });

    </script>
</x-app-layout>
