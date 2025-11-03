<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice Bill Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">QR Code</h3>
                            <div class="mt-4" id="qrcode"></div>
                            <div
                                class="mt-4 text-sm text-gray-700 dark:text-gray-200 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-200 dark:border-indigo-700 rounded-lg p-3">
                                <p class="font-semibold text-indigo-900 dark:text-indigo-200 mb-1">How to Pay</p>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Use Easypaisa, JazzCash, UPaisa, or any Pakistan bank app to scan the QR code
                                        and pay instantly.</li>
                                    <li>Prefer manual transfer? Use the details below and add your Invoice # in transfer
                                        reference:</li>
                                </ul>
                                <div class="mt-2 grid grid-cols-1 gap-1 text-[13px]">
                                    <div><span class="font-medium">Bank Name:</span> {{ config('app.bank_name') }}</div>
                                    <div><span class="font-medium">IBAN:</span> {{ config('app.iban') }}</div>
                                    <div><span class="font-medium">Payment Due Date:</span> {{
                                        $invoiceBill->transaction_date ?
                                        $invoiceBill->transaction_date->timezone('Asia/Karachi')->format('d-m-Y h:i:s
                                        A') : '—' }}</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Details</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Amount</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">PKR {{
                                        number_format($invoiceBill->amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaction
                                        Particulars</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->transaction_particulars ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Transaction Date</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->transaction_date ?
                                        $invoiceBill->transaction_date->timezone('Asia/Karachi')->format('d-m-Y h:i:s
                                        A') : '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-medium @if($invoiceBill->status === 'paid') bg-green-100 text-green-800 @elseif($invoiceBill->status === 'pending') bg-yellow-100 text-yellow-800 @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($invoiceBill->status) }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Payload</p>
                                    <p class="text-sm font-mono text-gray-700 dark:text-gray-300 break-all">{{
                                        $invoiceBill->payload }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Generated by</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->user->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Trip Information</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Trip Name</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->trip->trip_name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Guest Name</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->trip->guest_name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Check-in Date</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                        $invoiceBill->trip->check_in_date ?
                                        \Carbon\Carbon::parse($invoiceBill->trip->check_in_date)->timezone('Asia/Karachi')->format('d-m-Y
                                        h:i:s A') : '-' }}</p>
                                </div>
                                @if($invoiceBill->details)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Additional Details
                                    </p>
                                    <p class="text-sm text-gray-900 dark:text-gray-100">{{ $invoiceBill->details }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <button id="invoice-pdf-btn" type="button"
                            class="inline-flex items-center px-4 py-2 bg-indigo-700 hover:bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v12m0 0l-3.5-3.5M12 16l3.5-3.5M6 20h12" />
                            </svg>
                            Download PDF
                        </button>
                        <a href="{{ route('invoice-bills.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            {{ __('Back to list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                // Generate QR code for display
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
    <script>
        // Client-side PDF generator for Invoice Bills (similar to Audit implementation)
            (function(){
                function log(){ try{ console.log('[INVOICE PDF]', ...arguments);}catch(e){} }
                function status(msg){
                    var btn=document.getElementById('invoice-pdf-btn');
                    if(btn){ btn.dataset.stage=msg; btn.title='PDF: '+msg; }
                    log('Status:', msg);
                }
                
                function loadScriptOnce(id, src, readyTest){
                    return new Promise((res, rej)=>{
                        const existing=document.getElementById(id);
                        const isReady = function(){ try{ return !readyTest || readyTest(); }catch(e){ return false; } };
                        if(existing){
                            log('script already present', id);
                            if(isReady()) return res(true);
                            existing.addEventListener('load', ()=>{ if(isReady()) res(true); else rej(new Error('Library not ready after load '+id)); });
                            existing.addEventListener('error', ()=>rej(new Error('Load failed '+src)));
                            return;
                        }
                        const s=document.createElement('script'); s.id=id; s.src=src; s.async=true;
                        s.onload=()=>{ log('loaded', id); if(isReady()) res(true); else rej(new Error('Library not ready '+id)); };
                        s.onerror=()=>{ log('failed load', id, src); rej(new Error('Load failed '+src)); };
                        document.head.appendChild(s);
                    });
                }
                
                async function ensureLibs(){
                    async function attempt(id, primary, fallback, test){
                        try{ await loadScriptOnce(id, primary, test); }
                        catch(e){ if(fallback) { log('primary failed, trying fallback', id); await loadScriptOnce(id+'-fb', fallback, test); } else throw e; }
                    }
                    if(!(window.jspdf && window.jspdf.jsPDF)) await attempt('jspdf-core','https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js','https://unpkg.com/jspdf@2.5.1/dist/jspdf.umd.min.js', ()=>window.jspdf && window.jspdf.jsPDF);
                    if(!(window.jspdf && window.jspdf.jsPDF)) throw new Error('jsPDF load failed');
                }
                
                function fmt(dt){ if(!dt) return '-'; try{ return new Date(dt).toLocaleDateString('en-GB',{day:'2-digit',month:'short',year:'numeric'});}catch(e){return dt;} }
                
                async function runPdf(){ 
                    const btn=document.getElementById('invoice-pdf-btn'); 
                    if(!btn){ log('runPdf: no button'); return; }
                    
                    log('runPdf invoked'); 
                    status('clicked');
                    
                    try{ 
                        btn.disabled=true; 
                        btn.classList.add('opacity-50'); 
                        const originalText = btn.textContent;
                        btn.innerHTML = '<svg class="animate-spin h-4 w-4 mr-2 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Building PDF...';
                        
                        status('loading libs'); 
                        await ensureLibs(); 
                        log('libs ready'); 
                        status('libs ready'); 
                        
                        const { jsPDF } = window.jspdf;
                        
                        // Helper to load logo as data URL
                        async function loadImageAsDataURL(url){
                            const res = await fetch(url, { credentials: 'same-origin' });
                            if(!res.ok) throw new Error('Logo fetch failed: '+res.status);
                            const blob = await res.blob();
                            return await new Promise((resolve)=>{ const r=new FileReader(); r.onload=()=>resolve(r.result); r.readAsDataURL(blob); });
                        }
                        
                        // Invoice data from blade
                        const invoice = {
                            id: {{ $invoiceBill->id }},
                            amount: {{ $invoiceBill->amount }},
                            transaction_particulars: @json($invoiceBill->transaction_particulars),
                            transaction_date: @json($invoiceBill->transaction_date),
                            due_date: @json($invoiceBill->transaction_date),
                            status: @json($invoiceBill->status),
                            details: @json($invoiceBill->details),
                            payload: @json($invoiceBill->payload),
                            user: {
                                name: @json($invoiceBill->user->name),
                                email: @json($invoiceBill->user->email ?? '')
                            },
                            trip: {
                                name: @json($invoiceBill->trip->trip_name),
                                guest: @json($invoiceBill->trip->guest_name),
                                check_in: @json($invoiceBill->trip->check_in_date)
                            },
                            created_at: @json($invoiceBill->created_at),
                            bank: {
                                name: @json(config('app.bank_name')),
                                iban: @json(config('app.iban'))
                            }
                        };
                        
                        log('data prepared', invoice); 
                        status('building pdf');
                        
                        const doc = new jsPDF('p','pt','a4');
                        const pageWidth = doc.internal.pageSize.getWidth();
                        const pageHeight = doc.internal.pageSize.getHeight();
                        let y = 60;
                        
                        // Try to add brand logo (top-left)
                        try {
                            const logoUrl = @json(asset('icons-images/logo-imusafir.jpeg'));
                            const logoData = await loadImageAsDataURL(logoUrl);
                            // width ~100, maintain reasonable height
                            doc.addImage(logoData, 'JPEG', 40, 24, 100, 36);
                        } catch(e) {
                            log('logo load skipped', e.message);
                        }
                        
                        // Header
                        doc.setFont('helvetica','bold');
                        doc.setFontSize(18);
                        doc.setTextColor(20);
                        doc.text('INVOICE', pageWidth/2, 60, { align: 'center' });
                        
                        y = 90;
                        doc.setFontSize(10);
                        doc.setFont('helvetica','normal');
                        doc.setTextColor(60);
                        doc.text('Invoice #: ' + invoice.id, 40, y);
                        doc.text('Status: ' + (invoice.status || 'N/A').toUpperCase(), pageWidth - 40, y, { align: 'right' });
                        
                        y += 20;
                        doc.text('Date: ' + fmt(invoice.created_at), 40, y);
                        
                        y += 10;
                        doc.setDrawColor(200);
                        doc.setLineWidth(0.5);
                        doc.line(40, y, pageWidth - 40, y);
                        
                        y += 30;
                        
                        // Bill To section
                        doc.setFont('helvetica','bold');
                        doc.setFontSize(11);
                        doc.setTextColor(30);
                        doc.text('BILL TO:', 40, y);
                        
                        y += 20;
                        doc.setFont('helvetica','normal');
                        doc.setFontSize(10);
                        doc.setTextColor(60);
                        doc.text('Guest Name: ' + invoice.trip.guest, 40, y);
                        
                        y += 18;
                        doc.text('Trip: ' + invoice.trip.name, 40, y);
                        
                        if(invoice.trip.check_in) {
                            y += 18;
                            doc.text('Check-in Date: ' + fmt(invoice.trip.check_in), 40, y);
                        }
                        
                        y += 40;
                        
                        // Invoice details table
                        doc.setFont('helvetica','bold');
                        doc.setFillColor(240, 240, 240);
                        doc.rect(40, y, pageWidth - 80, 25, 'F');
                        doc.setTextColor(30);
                        doc.text('DESCRIPTION', 50, y + 16);
                        doc.text('AMOUNT', pageWidth - 120, y + 16);
                        
                        y += 25;
                        doc.setDrawColor(200);
                        doc.line(40, y, pageWidth - 40, y);
                        
                        y += 25;
                        doc.setFont('helvetica','normal');
                        doc.setTextColor(60);
                        
                        // Use database Details as primary description; fallback to Transaction Particulars; then generic
                        const description = (invoice.details && String(invoice.details).trim()) || invoice.transaction_particulars || 'Payment';
                        doc.text(description, 50, y);
                        doc.text('PKR ' + invoice.amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}), pageWidth - 50, y, { align: 'right' });
                        
                        y += 25;
                        doc.line(40, y, pageWidth - 40, y);
                        
                        // Total
                        y += 25;
                        doc.setFont('helvetica','bold');
                        doc.setFontSize(12);
                        doc.text('TOTAL:', pageWidth - 200, y);
                        doc.text('PKR ' + invoice.amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}), pageWidth - 50, y, { align: 'right' });
                        
                        // Due Date
                        y += 20;
                        doc.setFont('helvetica','normal');
                        doc.setFontSize(10);
                        doc.setTextColor(60);
                        doc.text('Payment Due Date: ' + (invoice.due_date ? fmt(invoice.due_date) : '-'), pageWidth - 50, y, { align: 'right' });
                        
                        // Additional details
                        if(invoice.details) {
                            y += 40;
                            doc.setFont('helvetica','bold');
                            doc.setFontSize(11);
                            doc.setTextColor(30);
                            doc.text('ADDITIONAL DETAILS:', 40, y);
                            
                            y += 20;
                            doc.setFont('helvetica','normal');
                            doc.setFontSize(9);
                            doc.setTextColor(60);
                            const detailsLines = doc.splitTextToSize(invoice.details, pageWidth - 80);
                            doc.text(detailsLines, 40, y);
                            y += detailsLines.length * 12 + 20;
                        }
                        
                        // QR Code section
                        if(invoice.payload) {
                            y += 20;
                            doc.setFont('helvetica','bold');
                            doc.setFontSize(11);
                            doc.setTextColor(30);
                            doc.text('PAYMENT QR CODE:', 40, y);
                            
                            y += 15;
                            
                            // Generate QR code using qrcodejs library
                            const qrContainer = document.createElement('div');
                            qrContainer.style.position = 'absolute';
                            qrContainer.style.left = '-9999px';
                            document.body.appendChild(qrContainer);
                            
                            const qr = new QRCode(qrContainer, {
                                text: invoice.payload,
                                width: 150,
                                height: 150,
                                colorDark: '#000000',
                                colorLight: '#FFFFFF',
                                correctLevel: QRCode.CorrectLevel.M
                            });
                            
                            // Wait for QR code to be generated
                            await new Promise(resolve => setTimeout(resolve, 100));
                            
                            const qrImg = qrContainer.querySelector('img');
                            if(qrImg && qrImg.src) {
                                doc.addImage(qrImg.src, 'PNG', 40, y, 120, 120);
                            }
                            
                            document.body.removeChild(qrContainer);
                            y += 140;
                        }
                        
                        // Payment Instructions
                        doc.setFont('helvetica','bold');
                        doc.setFontSize(11);
                        doc.setTextColor(30);
                        doc.text('PAYMENT INSTRUCTIONS', 40, y);
                        
                        y += 16;
                        doc.setFont('helvetica','normal');
                        doc.setFontSize(10);
                        doc.setTextColor(60);
                        const instructions = [
                            'You can make your payment using Easypaisa, JazzCash, UPaisa, or any Pakistan bank app by scanning the QR code above.',
                            'If you prefer a manual bank transfer, please use the details below and include your Invoice # ' + invoice.id + ' in the transfer reference:',
                            'Bank Name: ' + (invoice.bank.name || '-'),
                            'IBAN: ' + (invoice.bank.iban || '-')
                        ];
                        const instLines = doc.splitTextToSize(instructions.join('\n'), pageWidth - 80);
                        doc.text(instLines, 40, y);
                        y += instLines.length * 12 + 10;
                        
                        // Footer
                        doc.setFont('helvetica','normal');
                        doc.setFontSize(8);
                        doc.setTextColor(120);
                        doc.text('Generated by: ' + invoice.user.name, 40, pageHeight - 40);
                        doc.text('Generated on: ' + fmt(new Date()), pageWidth - 40, pageHeight - 40, { align: 'right' });
                        
                        // Page number
                        doc.setFontSize(8);
                        doc.setTextColor(90);
                        doc.text('Page 1 of 1', pageWidth/2, pageHeight - 20, { align: 'center' });
                        
                        const fname = 'invoice-' + invoice.id + '.pdf';
                        log('saving', fname); 
                        status('saving ' + fname); 
                        doc.save(fname); 
                        status('done');
                        
                    } catch(e){ 
                        log('error', e); 
                        status('error: ' + e.message); 
                        console.error(e); 
                        alert('Failed to build PDF: ' + e.message + ' (see console for details)'); 
                    } finally{ 
                        if(btn){ 
                            btn.disabled = false; 
                            btn.classList.remove('opacity-50'); 
                            btn.innerHTML = '<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-3.5-3.5M12 16l3.5-3.5M6 20h12" /></svg>Download PDF';
                        } 
                    }
                }
                
                async function init(){ 
                    const btn = document.getElementById('invoice-pdf-btn'); 
                    if(!btn || btn.dataset.init){ 
                        log('init: button missing or already init'); 
                    } else { 
                        btn.dataset.init = '1'; 
                        btn.addEventListener('click', runPdf, { once: false }); 
                        log('init: listener bound'); 
                        status('ready'); 
                    }
                    window.generateInvoicePdf = runPdf;
                }
                
                if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); 
                else init();
            })();
    </script>
    @endpush
</x-app-layout>