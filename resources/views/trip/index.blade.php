<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
                Trip List
            </h2>
            <div class="flex items-center">
                <a href="{{ route('trip.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Trip
                </a>
                <a href="javascript:;" id="toggle"
                   class="flex items-center px-4 py-1.5 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2"
                   title="Members List">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                </a>


            </div>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-8 print:hidden mt-2" style="display: none" id="filters">
        <div class="rounded-xl p-4 bg-white shadow-lg">
            <form method="GET" action="{{ route('trip.index') }}">
                <div class="mt-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <x-label for="id" value="{{ __('ID') }}" />
                        <x-input id="id" class="block mt-1 w-full" type="text" name="filter[id]" value="{{ request('filter.id') }}" />
                    </div>

                    <div>
                        <x-label for="trip_name" value="{{ __('Trip Name') }}" />
                        <x-input id="trip_name" class="block mt-1 w-full" type="text" name="filter[trip_name]" value="{{ request('filter.trip_name') }}" />
                    </div>

                    <div>
                        <x-label for="guest_name" value="{{ __('Guest Name') }}" />
                        <x-input id="guest_name" class="block mt-1 w-full" type="text" name="filter[guest_name]" value="{{ request('filter.guest_name') }}" />
                    </div>

                    <div>
                        <x-label for="guest_email" value="{{ __('Guest Email') }}" />
                        <x-input id="guest_email" class="block mt-1 w-full" type="email" name="filter[guest_email]" value="{{ request('filter.guest_email') }}" />
                    </div>

                    <div>
                        <x-label for="check_in_date" value="{{ __('Check-in Date') }}" />
                        <x-input id="check_in_date" class="block mt-1 w-full" type="date" name="filter[check_in_date]" value="{{ request('filter.check_in_date') }}" />
                    </div>

                    <div>
                        <x-label for="booking_date" value="{{ __('Booking Date') }}" />
                        <x-input id="booking_date" class="block mt-1 w-full" type="date" name="filter[booking_date]" value="{{ request('filter.booking_date') }}" />
                    </div>

                    <div>
                        <x-label for="total_cost_min" value="{{ __('Total Cost (Min)') }}" />
                        <x-input id="total_cost_min" class="block mt-1 w-full" type="number" step="0.01" name="filter[total_cost][0]" value="{{ request('filter.total_cost.0') }}" />
                    </div>

                    <div>
                        <x-label for="total_cost_max" value="{{ __('Total Cost (Max)') }}" />
                        <x-input id="total_cost_max" class="block mt-1 w-full" type="number" step="0.01" name="filter[total_cost][1]" value="{{ request('filter.total_cost.1') }}" />
                    </div>

                    <div>
                        <x-label for="agent_name" value="{{ __('Agent Name') }}" />
                        <x-input id="agent_name" class="block mt-1 w-full" type="text" name="filter[agent_name]" value="{{ request('filter.agent_name') }}" />
                    </div>

                    <div>
                        <x-label for="booking_status" value="Booking Status" class="block w-full" />
                        <select name="filter[booking_status]" id="booking_status" class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="">All</option>
                            <option value="Pending" {{ request('filter.booking_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Booked" {{ request('filter.booking_status') == 'Booked' ? 'selected' : '' }}>Booked</option>
                        </select>
                    </div>

                    <div>
                        <x-label for="sort" value="{{ __('Sort By') }}" />
                        <select name="sort" id="sort" class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="">None</option>
                            <option value="trip_name" {{ request('sort') == 'trip_name' ? 'selected' : '' }}>Trip Name</option>
                            <option value="check_in_date" {{ request('sort') == 'check_in_date' ? 'selected' : '' }}>Check-in Date</option>
                            <option value="booking_date" {{ request('sort') == 'booking_date' ? 'selected' : '' }}>Booking Date</option>
                            <option value="total_cost" {{ request('sort') == 'total_cost' ? 'selected' : '' }}>Total Cost</option>
                            <option value="-total_cost" {{ request('sort') == '-total_cost' ? 'selected' : '' }}>Total Cost (Descending)</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <x-button class="bg-indigo-500 text-white">
                        {{ __('Apply Filters') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4" />
                <div class="pb-0 lg:pb-0 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <div class="relative overflow-x-auto">
                        @if ($trips->isNotEmpty())
                            <table class="min-w-max w-full table-auto" style="font-size: 12px;">
                                <thead>
                                    <tr class="bg-gray-800 text-white uppercase text-sm">
                                        <th class="py-2 px-1 text-center">ID</th>
                                        <th class="py-2 px-1 text-center">Trip Name</th>
                                        <th class="py-2 px-1 text-center">Guest Name</th>
                                        <th class="py-2 px-1 text-center">Guest Contact</th>
                                        <th class="py-2 px-1 text-center">Check-in Date</th>
                                        <th class="py-2 px-1 text-center">Booking Date</th>
                                        <th class="py-2 px-1 text-center">Total Cost</th>
                                        <th class="py-2 px-1 text-center">Total Expenses</th>
                                        <th class="py-2 px-1 text-center">Profit</th>
                                        <th class="py-2 px-1 text-center">Agent Name</th>
                                        <th class="py-2 px-1 text-center">Booking Status</th>
                                        <th class="py-2 px-1 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm">
                                    @foreach ($trips as $trip)
                                        <tr
                                            class="border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="py-1 px-1 text-black text-center">{{ $loop->iteration }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->trip_name }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->guest_name }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->guest_contact }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->check_in_date }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->booking_date }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->total_cost }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->total_expenses }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->profit }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->agent_name }}</td>
                                            <td class="py-1 px-1 text-black text-center">{{ $trip->booking_status }}</td>
                                            <td class="py-1 px-1 text-black text-center">
                                                <a href="{{ route('trip.show', $trip->id) }}"
                                                    class="inline-flex items-center px-2 py-2 text-indigo-600 hover:text-indigo-900"
                                                    title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 14v5m0-17v5m-9-2h5m12 0h-5m-6 10l3-3m2 3l3-3" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('trip.edit', $trip->id) }}"
                                                    class="inline-flex items-center px-2 py-2 text-indigo-600 hover:text-indigo-900"
                                                    title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('trip.destroy', $trip->id) }}" method="post"
                                                    class="inline-block"
                                                    onsubmit="return confirm('Do you really want to delete the record?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-2 py-2 text-red-600 hover:text-red-900"
                                                        title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="p-6">No trips found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        <script>

            const targetDiv = document.getElementById("filters");
            const btn = document.getElementById("toggle");
            btn.onclick = function () {
                if (targetDiv.style.display !== "none") {
                    targetDiv.style.display = "none";
                } else {
                    targetDiv.style.display = "block";
                }
            };

            function redirectToLink(url) {
                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
