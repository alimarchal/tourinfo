<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Create Trip
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />

                <div
                    class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                    <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Trip
                        Information</h2>

                    <x-validation-errors class="mb-4 mt-4" />

                    <form method="POST" action="{{ route('trip.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                            <!-- Form fields for Trip -->
                            <div>
                                <x-label for="trip_name" value="Trip Name" />
                                <x-input id="trip_name" class="block mt-1 w-full" type="text" name="trip_name"
                                    :value="old('trip_name')" />
                            </div>

                            <div>
                                <x-label for="guest_name" value="Guest Name" />
                                <x-input id="guest_name" class="block mt-1 w-full" type="text" name="guest_name"
                                    :value="old('guest_name')" />
                            </div>

                            <div>
                                <x-label for="guest_email" value="Guest Email" />
                                <x-input id="guest_email" class="block mt-1 w-full" type="email" name="guest_email"
                                    :value="old('guest_email')" />
                            </div>

                            <div>
                                <x-label for="guest_contact" value="Guest Contact" />
                                <x-input id="guest_contact" class="block mt-1 w-full" type="text"
                                    name="guest_contact" :value="old('guest_contact')" />
                            </div>

                            <div>
                                <x-label for="check_in_date" value="Check-in Date" />
                                <x-input id="check_in_date" class="block mt-1 w-full" type="date"
                                    name="check_in_date" :value="old('check_in_date')" />
                            </div>

                            <div>
                                <x-label for="booking_date" value="Booking Date" />
                                <x-input id="booking_date" class="block mt-1 w-full" type="date" name="booking_date"
                                    :value="old('booking_date')" />
                            </div>

                            <div>
                                <x-label for="total_cost" value="Total Cost" />
                                <x-input id="total_cost" class="block mt-1 w-full" type="number" step="0.01"
                                    name="total_cost" :value="old('total_cost')" />
                            </div>

                            <div>
                                <x-label for="total_expenses" value="Total Expenses" />
                                <x-input id="total_expenses" class="block mt-1 w-full" type="number" step="0.01"
                                    name="total_expenses" :value="old('total_expenses')" />
                            </div>

                            <div>
                                <x-label for="profit" value="Profit" />
                                <x-input id="profit" class="block mt-1 w-full" type="number" step="0.01"
                                    name="profit" :value="old('profit')" />
                            </div>

                            <div>
                                <x-label for="agent_name" value="Agent Name" />
                                <x-input id="agent_name" class="block mt-1 w-full" type="text" name="agent_name"
                                    :value="old('agent_name')" />
                            </div>

                            <div>
                                <x-label for="booking_status" value="Booking Status" />
                                <select name="booking_status" id="booking_status" class="block mt-1 w-full">
                                    <option value="Pending" {{ old('booking_status') == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Booked" {{ old('booking_status') == 'Booked' ? 'selected' : '' }}>
                                        Booked</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">Save</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
