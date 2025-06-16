<x-app-layout>
    @push('header')
    @endpush
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight">
                Edit Trip
            </h2>
            @include('back-navigation')
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div
                    class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <div
                        class="px-6 py-6 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                        <div class="text-center mb-6">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Edit Trip Information</h2>
                            <div
                                class="mt-2 h-1 w-24 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full">
                            </div>
                        </div>

                        <x-validation-errors class="mb-4 mt-4" />

                        <form method="POST" action="{{ route('trip.update', $trip->id) }}" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Trip Basic Info Section -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                                <h3
                                    class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Basic Information
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div>
                                        <x-label for="trip_name" value="Trip Name"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="trip_name"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="text" name="trip_name" :value="old('trip_name', $trip->trip_name)"
                                            placeholder="Enter trip name" />
                                    </div>

                                    <div>
                                        <x-label for="tour_type" value="Tour Type"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <select name="tour_type" id="tour_type"
                                            class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <option value="">Select Tour Type</option>
                                            <option value="Domestic" {{ old('tour_type', $trip->tour_type) == 'Domestic' ? 'selected' : '' }}>Domestic</option>
                                            <option value="International" {{ old('tour_type', $trip->tour_type) == 'International' ? 'selected' : '' }}>International
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <x-label for="agent_name" value="Agent Name"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="agent_name"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="text" name="agent_name" :value="old('agent_name', $trip->agent_name)"
                                            placeholder="Enter agent name" />
                                    </div>
                                </div>
                            </div>

                            <!-- Guest Information Section -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                                <h3
                                    class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    Guest Information
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div>
                                        <x-label for="guest_name" value="Guest Name"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="guest_name"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="text" name="guest_name" :value="old('guest_name', $trip->guest_name)"
                                            placeholder="Enter guest name" />
                                    </div>

                                    <div>
                                        <x-label for="guest_email" value="Guest Email"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="guest_email"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="email" name="guest_email" :value="old('guest_email', $trip->guest_email)" placeholder="Enter guest email" />
                                    </div>

                                    <div>
                                        <x-label for="guest_contact" value="Guest Contact"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="guest_contact"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="text" name="guest_contact" :value="old('guest_contact', $trip->guest_contact)" placeholder="Enter contact number" />
                                    </div>
                                </div>
                            </div>

                            <!-- Dates & Booking Section -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                                <h3
                                    class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Dates & Status
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div>
                                        <x-label for="check_in_date" value="Check-in Date"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="check_in_date"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="date" name="check_in_date" :value="old('check_in_date', $trip->check_in_date)" />
                                    </div>

                                    <div>
                                        <x-label for="booking_date" value="Booking Date"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="booking_date"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="date" name="booking_date" :value="old('booking_date', $trip->booking_date)" />
                                    </div>

                                    <div>
                                        <x-label for="booking_status" value="Booking Status"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <select name="booking_status" id="booking_status"
                                            class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <option value="">Select Status</option>
                                            <option value="Pending" {{ old('booking_status', $trip->booking_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Booked" {{ old('booking_status', $trip->booking_status) == 'Booked' ? 'selected' : '' }}>Booked</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Financial Information Section -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                                <h3
                                    class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                    Financial Information
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <x-label for="total_cost" value="Total Cost"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="total_cost"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="number" step="0.01" name="total_cost" :value="old('total_cost', $trip->total_cost)" placeholder="0.00" />
                                    </div>

                                    <div>
                                        <x-label for="total_expenses" value="Total Expenses"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="total_expenses"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="number" step="0.01" name="total_expenses"
                                            :value="old('total_expenses', $trip->total_expenses)" placeholder="0.00" />
                                    </div>

                                    <div>
                                        <x-label for="profit" value="Profit"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                                        <x-input id="profit"
                                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            type="number" step="0.01" name="profit" :value="old('profit', $trip->profit)" placeholder="0.00" />
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                                <a href="{{ route('trip.index') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Back to List
                                </a>

                                <x-button
                                    class="bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200"
                                    id="submit-btn">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update Trip
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>