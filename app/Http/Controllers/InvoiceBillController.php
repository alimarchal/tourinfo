<?php

namespace App\Http\Controllers;

use App\Models\InvoiceBill;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InvoiceBillController extends Controller
{
    public function index()
    {
        $invoiceBills = QueryBuilder::for(InvoiceBill::class)
            ->allowedFilters([
                AllowedFilter::exact('trip_id'),
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('status'),
                AllowedFilter::callback('date_from', function ($query, $value) {
                    $query->whereDate('transaction_date', '>=', $value);
                }),
                AllowedFilter::callback('date_to', function ($query, $value) {
                    $query->whereDate('transaction_date', '<=', $value);
                }),
            ])
            ->with(['user', 'trip'])
            ->latest()
            ->paginate(10);

        $trips = Trip::all();
        $users = User::all();

        return view('invoice-bills.index', compact('invoiceBills', 'trips', 'users'));
    }

    public function create()
    {
        $transactionParticulars = [
            "Bill Payment" => "Bill Payment - Internet/Cable/Utility bills",
            "Donations/Charity/Zakat" => "Donations/Charity/Zakat - NGOs/Social welfare",
            "Educational Payment" => "Educational Payment - School/College fees",
            "Transfer to Family & Friends" => "Transfer to Family & Friends",
            "Insurance/Takaful" => "Insurance/Takaful - Premium payments",
            "Investments" => "Investments - Mutual funds/Business",
            "Loan/Credit Card Payments" => "Loan/Credit Card Payments",
            "Medical Expenses" => "Medical Expenses - Hospital/Clinic/Pharmacy",
            "Food & Groceries" => "Food & Groceries Purchases",
            "Clothing & Accessories" => "Clothing & Accessories",
            "Subscription/Membership" => "Subscription/Membership/Rental",
            "Salaries/Wages" => "Salaries/Wages - Domestic staff",
            "Travelling" => "Travelling - Transport/Hotel expenses",
            "Vendor/Supplier Payment" => "Vendor/Supplier/Business Payment",
            "Others" => "Others",
        ];
        $trips = Trip::all();

        return view('invoice-bills.create', compact('transactionParticulars', 'trips'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'details' => 'nullable|string',
            'amount' => 'required|numeric|min:1',
            'transaction_particulars' => 'nullable|string|max:30',
            'transaction_date' => 'nullable|date',
            'status' => 'required|string|in:pending,paid,cancelled',
        ]);

        $iban = config('app.iban');
        if (!$iban) {
            return back()->with('error', 'IBAN is not configured in your .env file.');
        }

        $amount = $validated['amount'];
        $particulars = $validated['transaction_particulars'] ?? null;
        $expiry = isset($validated['transaction_date']) ? \Carbon\Carbon::parse($validated['transaction_date'])->format('dmYhi') : null;

        $payload = '';
        // Tag 00
        $payload .= '00' . '02' . '02';
        // Tag 01
        $payload .= '01' . '02' . '12';
        // Tag 02
        $payload .= '02' . '02' . '00';
        // Tag 04
        $ibanClean = strtoupper(substr($iban, 0, 26));
        $ibanLength = str_pad(strlen($ibanClean), 2, '0', STR_PAD_LEFT);
        $payload .= '04' . $ibanLength . $ibanClean;
        // Tag 05
        $amountStr = number_format($amount, 2, '.', '');
        $amountLength = str_pad(strlen($amountStr), 2, '0', STR_PAD_LEFT);
        $payload .= '05' . $amountLength . $amountStr;
        // Tag 06
        if ($particulars) {
            $particularsClean = substr($particulars, 0, 30);
            $particularsLength = str_pad(strlen($particularsClean), 2, '0', STR_PAD_LEFT);
            $payload .= '06' . $particularsLength . $particularsClean;
        }
        // Tag 07
        if ($expiry) {
            $payload .= '07' . '12' . $expiry;
        }
        // Tag 10
        $payloadWithoutCRC = $payload . '10' . '04';
        $crc = $this->crc16_ccitt($payloadWithoutCRC);
        $payload .= '10' . '04' . $crc;

        $invoiceBill = InvoiceBill::create([
            'user_id' => Auth::id(),
            'trip_id' => $validated['trip_id'],
            'details' => $validated['details'],
            'amount' => $amount,
            'transaction_particulars' => $particulars,
            'transaction_date' => $validated['transaction_date'] ?? null,
            'status' => $validated['status'],
            'payload' => $payload,
        ]);

        return redirect()->route('invoice-bills.show', $invoiceBill)->with('success', 'Invoice Bill created successfully.');
    }

    public function show(InvoiceBill $invoiceBill)
    {
        return view('invoice-bills.show', compact('invoiceBill'));
    }

    public function edit(InvoiceBill $invoiceBill)
    {
        $transactionParticulars = [
            "Bill Payment" => "Bill Payment - Internet/Cable/Utility bills",
            "Donations/Charity/Zakat" => "Donations/Charity/Zakat - NGOs/Social welfare",
            "Educational Payment" => "Educational Payment - School/College fees",
            "Transfer to Family & Friends" => "Transfer to Family & Friends",
            "Insurance/Takaful" => "Insurance/Takaful - Premium payments",
            "Investments" => "Investments - Mutual funds/Business",
            "Loan/Credit Card Payments" => "Loan/Credit Card Payments",
            "Medical Expenses" => "Medical Expenses - Hospital/Clinic/Pharmacy",
            "Food & Groceries" => "Food & Groceries Purchases",
            "Clothing & Accessories" => "Clothing & Accessories",
            "Subscription/Membership" => "Subscription/Membership/Rental",
            "Salaries/Wages" => "Salaries/Wages - Domestic staff",
            "Travelling" => "Travelling - Transport/Hotel expenses",
            "Vendor/Supplier Payment" => "Vendor/Supplier/Business Payment",
            "Others" => "Others",
        ];
        $trips = Trip::all();
        return view('invoice-bills.edit', compact('invoiceBill', 'transactionParticulars', 'trips'));
    }

    public function update(Request $request, InvoiceBill $invoiceBill)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'details' => 'nullable|string',
            'amount' => 'required|numeric|min:1',
            'transaction_particulars' => 'nullable|string|max:30',
            'transaction_date' => 'nullable|date',
            'status' => 'required|string|in:pending,paid,cancelled',
        ]);

        $iban = config('app.iban');
        if (!$iban) {
            return back()->with('error', 'IBAN is not configured in your .env file.');
        }

        $amount = $validated['amount'];
        $particulars = $validated['transaction_particulars'] ?? null;
        $expiry = isset($validated['transaction_date']) ? \Carbon\Carbon::parse($validated['transaction_date'])->format('dmYhi') : null;

        $payload = '';
        // Tag 00
        $payload .= '00' . '02' . '02';
        // Tag 01
        $payload .= '01' . '02' . '12';
        // Tag 02
        $payload .= '02' . '02' . '00';
        // Tag 04
        $ibanClean = strtoupper(substr($iban, 0, 26));
        $ibanLength = str_pad(strlen($ibanClean), 2, '0', STR_PAD_LEFT);
        $payload .= '04' . $ibanLength . $ibanClean;
        // Tag 05
        $amountStr = number_format($amount, 2, '.', '');
        $amountLength = str_pad(strlen($amountStr), 2, '0', STR_PAD_LEFT);
        $payload .= '05' . $amountLength . $amountStr;
        // Tag 06
        if ($particulars) {
            $particularsClean = substr($particulars, 0, 30);
            $particularsLength = str_pad(strlen($particularsClean), 2, '0', STR_PAD_LEFT);
            $payload .= '06' . $particularsLength . $particularsClean;
        }
        // Tag 07
        if ($expiry) {
            $payload .= '07' . '12' . $expiry;
        }
        // Tag 10
        $payloadWithoutCRC = $payload . '10' . '04';
        $crc = $this->crc16_ccitt($payloadWithoutCRC);
        $payload .= '10' . '04' . $crc;

        $invoiceBill->update([
            'trip_id' => $validated['trip_id'],
            'details' => $validated['details'],
            'amount' => $amount,
            'transaction_particulars' => $particulars,
            'transaction_date' => $validated['transaction_date'] ?? null,
            'status' => $validated['status'],
            'payload' => $payload,
        ]);

        return redirect()->route('invoice-bills.index')->with('success', 'Invoice Bill updated successfully.');
    }

    public function destroy(InvoiceBill $invoiceBill)
    {
        $invoiceBill->delete();
        return redirect()->route('invoice-bills.index')->with('success', 'Invoice Bill deleted successfully.');
    }

    private function crc16_ccitt($data)
    {
        $crc = 0xFFFF;
        for ($i = 0; $i < strlen($data); $i++) {
            $crc ^= ord($data[$i]) << 8;
            for ($j = 0; $j < 8; $j++) {
                $crc = ($crc & 0x8000) ? (($crc << 1) ^ 0x1021) : ($crc << 1);
            }
        }
        return str_pad(strtoupper(dechex($crc & 0xFFFF)), 4, '0', STR_PAD_LEFT);
    }
}
