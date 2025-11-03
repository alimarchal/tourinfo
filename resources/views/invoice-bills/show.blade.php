<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice Bill Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">QR Code</h3>
                            <div class="mt-4" id="qrcode"></div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Details</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Amount</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">PKR {{ number_format($invoiceBill->amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaction Particulars</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $invoiceBill->transaction_particulars ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaction Date</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $invoiceBill->transaction_date ? $invoiceBill->transaction_date->format('Y-m-d H:i') : '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Payload</p>
                                    <p class="text-sm font-mono text-gray-700 dark:text-gray-300 break-all">{{ $invoiceBill->payload }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('invoice-bills.index') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            {{ __('Back to list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new QRCode(document.getElementById('qrcode'), {
                    text: "{{ $invoiceBill->payload }}",
                    width: 256,
                    height: 256,
                    colorDark: '#000000',
                    colorLight: '#FFFFFF',
                    correctLevel: QRCode.CorrectLevel.M
                });
            });
        </script>
    @endpush
</x-app-layout>