<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Invoice Bill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('invoice-bills.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-label for="trip_id" value="{{ __('Trip') }}" />
                                <select id="trip_id" name="trip_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="">Select a trip</option>
                                    @foreach($trips as $trip)
                                        <option value="{{ $trip->id }}">{{ $trip->trip_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-label for="amount" value="{{ __('Amount (PKR)') }}" />
                                <x-input id="amount" name="amount" type="number" class="mt-1 block w-full" min="1" step="0.01" required />
                            </div>

                            <div>
                                <x-label for="transaction_particulars" value="{{ __('Transaction Particulars (Optional)') }}" />
                                <select id="transaction_particulars" name="transaction_particulars" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select purpose (optional)</option>
                                    @foreach($transactionParticulars as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-label for="transaction_date" value="{{ __('Transaction Date (Optional)') }}" />
                                <x-input id="transaction_date" name="transaction_date" type="datetime-local" class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-label for="status" value="{{ __('Status') }}" />
                                <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <x-label for="details" value="{{ __('Details (Optional)') }}" />
                                <textarea id="details" name="details" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>