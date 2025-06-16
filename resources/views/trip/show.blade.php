<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ $trip->trip_name }} Details
        </h2>

        <div class="flex justify-center items-center float-right">

            <a href="{{ route('trip.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Back
            </a>


        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Trip Information</h3>
                            <hr class="my-3 border-gray-300">
                            <div class="mb-4">
                                <p><strong>Tour Type:</strong>
                                    @if($trip->tour_type)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $trip->tour_type == 'Domestic' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $trip->tour_type }}
                                        </span>
                                    @else
                                        <span class="text-gray-500">Not specified</span>
                                    @endif
                                </p>
                                <p><strong>Guest Name:</strong> {{ $trip->guest_name }}</p>
                                <p><strong>Guest Email:</strong> {{ $trip->guest_email }}</p>
                                <p><strong>Guest Contact:</strong> {{ $trip->guest_contact }}</p>
                                <p><strong>Check-in Date:</strong>
                                    @if ($trip->check_in_date)
                                        {{ \Carbon\Carbon::parse($trip->check_in_date)->format('M d, Y') }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                                <p><strong>Booking Date:</strong>
                                    @if ($trip->booking_date)
                                        {{ \Carbon\Carbon::parse($trip->booking_date)->format('M d, Y') }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                                <p><strong>Total Cost:</strong> Rs.{{ number_format($trip->total_cost, 2) }}</p>
                                <p><strong>Total Expenses:</strong> ${{ number_format($trip->total_expenses, 2) }}</p>
                                <p><strong>Profit:</strong> Rs.{{ number_format($trip->profit, 2) }}</p>
                                <p><strong>Agent Name:</strong> {{ $trip->agent_name }}</p>
                                <p><strong>Booking Status:</strong> <span
                                        class="text-green-600">{{ $trip->booking_status }}</span></p>
                                @if(!empty($trip->path_attachment))
                                    <p><strong>Attachment:</strong> <span class="text-green-600">
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($trip->path_attachment) }}"
                                                target="_blank">View Attachment</a>
                                        </span></p>
                                @endif

                            </div>
                        </div>
                        <div>
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Add a Comment</h3>
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                    <textarea name="description" id="description" rows="3"
                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        placeholder="Enter your comment here..."></textarea>
                                    <div class="flex justify-end mt-4">
                                        <button type="submit"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Previous Comments</h3>
                    <div>
                        @forelse ($trip->comments as $comment)
                            <div class="bg-gray-100 rounded-lg p-4 mb-4">
                                <p class="text-gray-800">{{ $comment->description }}</p>
                                <p class="text-sm text-gray-500 mt-2">Added on
                                    {{ $comment->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-500">No comments yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>