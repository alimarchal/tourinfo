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
    <div class="max-w-8xl mx-auto px-4 sm:px-2 lg:px-8 print:hidden mt-2" style="display: none" id="filters">
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


                    <div class="col-span-2">
                        <x-label for="check_in_date_range" value="{{ __('Check-in Date Range') }}" />
                        <input id="check_in_date_range" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" placeholder="Select date range" readonly />
                        <input type="hidden" id="check_in_date_from" name="filter[check_in_date][from]" value="{{ request('filter.check_in_date.from') }}">
                        <input type="hidden" id="check_in_date_to" name="filter[check_in_date][to]" value="{{ request('filter.check_in_date.to') }}">
                    </div>



                    <!-- Replace the booking date from/to fields with this -->
<div class="col-span-2">
    <x-label for="booking_date_range" value="{{ __('Booking Date Range') }}" />
    <input id="booking_date_range" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" placeholder="Select date range" readonly />
    <input type="hidden" id="booking_date_from" name="filter[booking_date][from]" value="{{ request('filter.booking_date.from') }}">
    <input type="hidden" id="booking_date_to" name="filter[booking_date][to]" value="{{ request('filter.booking_date.to') }}">
</div>



                    {{--                    <div>--}}
                    {{--                        <x-label for="check_in_date" value="{{ __('Check-in Date') }}" />--}}
                    {{--                        <x-input id="check_in_date" class="block mt-1 w-full" type="date" name="filter[check_in_date]" value="{{ request('filter.check_in_date') }}" />--}}
                    {{--                    </div>--}}

                    {{--                    <div>--}}
                    {{--                        <x-label for="booking_date" value="{{ __('Booking Date') }}" />--}}
                    {{--                        <x-input id="booking_date" class="block mt-1 w-full" type="date" name="filter[booking_date]" value="{{ request('filter.booking_date') }}" />--}}
                    {{--                    </div>--}}

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
                        <x-label for="tour_type" value="Tour Type" class="block w-full" />
                        <select name="filter[tour_type]" id="tour_type" class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="">All</option>
                            <option value="Domestic" {{ request('filter.tour_type') == 'Domestic' ? 'selected' : '' }}>Domestic</option>
                            <option value="International" {{ request('filter.tour_type') == 'International' ? 'selected' : '' }}>International</option>
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



    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8  print:shadow-none">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none">
                <x-status-message class="ml-4 mt-4"/>
                <x-validation-errors class="ml-4 mt-4"/>
                @if ($trips->isNotEmpty())
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow-lg ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300 text-sm">
                                    <thead class="bg-gradient-to-r from-blue-900 to-blue-700 text-white">
                                        <tr>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">ID</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Trip Name</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Tour Type</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Guest Name</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Contact</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Check-in</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Booking</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Cost</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Expenses</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Profit</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Agent</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider">Status</th>
                                            <th scope="col" class="py-3 px-2 text-center text-xs font-semibold uppercase tracking-wider print:hidden">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($trips as $trip)
                                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                <td class="py-2 px-2 text-center text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                                <td class="py-2 px-2 text-left text-sm text-gray-900" title="{{ $trip->trip_name }}">
                                                    {{ \Illuminate\Support\Str::limit($trip->trip_name, 20) }}
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm">
                                                    @if($trip->tour_type)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $trip->tour_type == 'Domestic' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                                            {{ $trip->tour_type }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm text-gray-900" title="{{ $trip->guest_name }}">
                                                    {{ \Illuminate\Support\Str::limit($trip->guest_name, 15) }}
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm">
                                                    <a href="tel:{{ $trip->guest_contact }}" class="text-blue-600 hover:text-blue-900 hover:underline">
                                                        {{ $trip->guest_contact }}
                                                    </a>
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm text-gray-900">
                                                    {{ $trip->check_in_date ? \Carbon\Carbon::parse($trip->check_in_date)->format('d/M/y') : '-' }}
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm text-gray-900">
                                                    {{ $trip->booking_date ? \Carbon\Carbon::parse($trip->booking_date)->format('d/M/y') : '-' }}
                                                </td>
                                                <td class="py-2 px-2 text-right text-sm font-medium text-gray-900">
                                                    Rs. {{ number_format($trip->total_cost, 2) }}
                                                </td>
                                                <td class="py-2 px-2 text-right text-sm font-medium text-gray-900">
                                                    Rs. {{ number_format($trip->total_expenses, 2) }}
                                                </td>
                                                <td class="py-2 px-2 text-right text-sm font-medium {{ $trip->profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                                    Rs. {{ number_format($trip->profit, 2) }}
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm text-gray-900">{{ $trip->agent_name }}</td>
                                                <td class="py-2 px-2 text-center text-sm">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $trip->booking_status == 'Booked' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                        {{ $trip->booking_status }}
                                                    </span>
                                                </td>
                                                <td class="py-2 px-2 text-center text-sm print:hidden">
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <a href="{{ route('trip.show', $trip->id) }}" 
                                                           class="text-indigo-600 hover:text-indigo-900 p-1 rounded hover:bg-indigo-50 transition-colors"
                                                           title="View">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('trip.edit', $trip->id) }}" 
                                                           class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition-colors"
                                                           title="Edit">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('trip.destroy', $trip->id) }}" method="post" 
                                                              class="inline-block"
                                                              onsubmit="return confirm('Do you really want to delete this trip?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition-colors"
                                                                    title="Delete">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-gradient-to-r from-blue-900 to-blue-700 text-white font-semibold">
                                            <td class="py-3 px-2 text-right font-bold" colspan="7">Total:</td>
                                            <td class="py-3 px-2 text-right font-bold">Rs. {{ number_format($sums->total_cost_sum, 2) }}</td>
                                            <td class="py-3 px-2 text-right font-bold">Rs. {{ number_format($sums->total_expenses_sum, 2) }}</td>
                                            <td class="py-3 px-2 text-right font-bold">Rs. {{ number_format($sums->profit_sum, 2) }}</td>
                                            <td class="py-3 px-2"></td>
                                            <td class="py-3 px-2"></td>
                                            <td class="py-3 px-2 print:hidden"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex items-center justify-between">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    @if ($trips->onFirstPage())
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                            Previous
                                        </span>
                                    @else
                                        <a href="{{ $trips->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                            Previous
                                        </a>
                                    @endif

                                    @if ($trips->hasMorePages())
                                        <a href="{{ $trips->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                            Next
                                        </a>
                                    @else
                                        <span class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                            Next
                                        </span>
                                    @endif
                                </div>

                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium">{{ $trips->firstItem() }}</span>
                                            to
                                            <span class="font-medium">{{ $trips->lastItem() }}</span>
                                            of
                                            <span class="font-medium">{{ $trips->total() }}</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        {{ $trips->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No trips found</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new trip.</p>
                        <div class="mt-6">
                            <a href="{{ route('trip.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                New Trip
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('modals')


            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize flatpickr date range picker
                const dateRangePicker = flatpickr("#check_in_date_range", {
                    mode: "range",
                    dateFormat: "Y-m-d",
                    disableMobile: "true",
                    onClose: function(selectedDates, dateStr, instance) {
                        if (selectedDates.length === 2) {
                            const startDate = flatpickr.formatDate(selectedDates[0], "Y-m-d");
                            const endDate = flatpickr.formatDate(selectedDates[1], "Y-m-d");

                            document.getElementById('check_in_date_from').value = startDate;
                            document.getElementById('check_in_date_to').value = endDate;
                        }
                    }
                });

                // Pre-populate date range picker if values exist
                const fromDate = document.getElementById('check_in_date_from').value;
                const toDate = document.getElementById('check_in_date_to').value;

                if (fromDate && toDate) {
                    dateRangePicker.setDate([fromDate, toDate]);
                }

                // Update the existing form submit event handler
                const form = document.querySelector('form');
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const checkInFrom = document.getElementById('check_in_date_from').value;
                    const checkInTo = document.getElementById('check_in_date_to').value;
                    const bookingFrom = document.getElementById('booking_date_from').value;
                    const bookingTo = document.getElementById('booking_date_to').value;

                    if (checkInFrom && checkInTo) {
                        const checkInDateInput = document.createElement('input');
                        checkInDateInput.type = 'hidden';
                        checkInDateInput.name = 'filter[check_in_date]';
                        checkInDateInput.value = `${checkInFrom},${checkInTo}`;
                        form.appendChild(checkInDateInput);
                    }

                    if (bookingFrom && bookingTo) {
                        const bookingDateInput = document.createElement('input');
                        bookingDateInput.type = 'hidden';
                        bookingDateInput.name = 'filter[booking_date]';
                        bookingDateInput.value = `${bookingFrom},${bookingTo}`;
                        form.appendChild(bookingDateInput);
                    }

                    form.submit();
                });



                const bookingDateRangePicker = flatpickr("#booking_date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            disableMobile: "true",
            onClose: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    const startDate = flatpickr.formatDate(selectedDates[0], "Y-m-d");
                    const endDate = flatpickr.formatDate(selectedDates[1], "Y-m-d");

                    document.getElementById('booking_date_from').value = startDate;
                    document.getElementById('booking_date_to').value = endDate;
                }
            }
        });

        // Pre-populate booking date range picker if values exist
        const bookingFromDate = document.getElementById('booking_date_from').value;
        const bookingToDate = document.getElementById('booking_date_to').value;

        if (bookingFromDate && bookingToDate) {
            bookingDateRangePicker.setDate([bookingFromDate, bookingToDate]);
        }

            });
        </script>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('form');
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            const checkInFrom = document.getElementById('check_in_date_from').value;
                            const checkInTo = document.getElementById('check_in_date_to').value;
                            const bookingFrom = document.getElementById('booking_date_from').value;
                            const bookingTo = document.getElementById('booking_date_to').value;

                            if (checkInFrom && checkInTo) {
                                const checkInDateInput = document.createElement('input');
                                checkInDateInput.type = 'hidden';
                                checkInDateInput.name = 'filter[check_in_date]';
                                checkInDateInput.value = `${checkInFrom},${checkInTo}`;
                                form.appendChild(checkInDateInput);
                            }

                            if (bookingFrom && bookingTo) {
                                const bookingDateInput = document.createElement('input');
                                bookingDateInput.type = 'hidden';
                                bookingDateInput.name = 'filter[booking_date]';
                                bookingDateInput.value = `${bookingFrom},${bookingTo}`;
                                form.appendChild(bookingDateInput);
                            }

                            form.submit();
                        });
                    });
                </script>

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