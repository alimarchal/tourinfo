<x-app-layout>
    @push('header')
    @endpush
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
                Trip List
            </h2>
            <div class="flex items-center">
                <a href="{{ route('trip.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-white text-indigo-600 border border-indigo-600 text-xs font-semibold uppercase rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Trip
                </a>
                @include('back-navigation')
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4" />
                <div
                    class="pb-2 lg:pb-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <div class="relative overflow-x-auto">
                        @if ($trips->isNotEmpty())
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-800 text-white uppercase text-sm">
                                        <th class="py-3 px-6 text-center">ID</th>
                                        <th class="py-3 px-6 text-center">Trip Name</th>
                                        <th class="py-3 px-6 text-center">Guest Name</th>
                                        <th class="py-3 px-6 text-center">Guest Email</th>
                                        <th class="py-3 px-6 text-center">Guest Contact</th>
                                        <th class="py-3 px-6 text-center">Check-in Date</th>
                                        <th class="py-3 px-6 text-center">Booking Date</th>
                                        <th class="py-3 px-6 text-center">Total Cost</th>
                                        <th class="py-3 px-6 text-center">Total Expenses</th>
                                        <th class="py-3 px-6 text-center">Profit</th>
                                        <th class="py-3 px-6 text-center">Agent Name</th>
                                        <th class="py-3 px-6 text-center">Booking Status</th>
                                        <th class="py-3 px-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm">
                                    @foreach ($trips as $trip)
                                        <tr
                                            class="border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->trip_name }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->guest_name }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->guest_email }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->guest_contact }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->check_in_date }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->booking_date }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->total_cost }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->total_expenses }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->profit }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->agent_name }}</td>
                                            <td class="py-3 px-6 text-center">{{ $trip->booking_status }}</td>
                                            <td class="py-3 px-6 text-center">
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
                            <div class="text-center py-4">
                                <p class="text-gray-700 dark:text-gray-400">No trips found. Please add a new trip.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Existing code -->

                <!-- Add comments section -->
                <div class="bg-white dark:bg-gray-800 p-6 mt-4 rounded-lg shadow-md">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-200">Add a
                                comment:</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-gray-900 dark:text-gray-300"></textarea>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit" action="post"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white border border-indigo-600 text-xs font-semibold uppercase rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                method="POST">
                                @csrf
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
