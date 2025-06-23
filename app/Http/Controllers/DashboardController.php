<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Get date filters from request
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $dateField = $request->get('date_field', 'booking_date'); // Default to booking_date

        // Set default date range if not provided
        if (!$startDate || !$endDate) {
            $startDate = Carbon::now()->startOfYear()->toDateString();
            $endDate = Carbon::now()->endOfYear()->toDateString();
        }

        // Build base query with date filtering
        $baseQuery = Trip::query();
        if ($startDate && $endDate) {
            $baseQuery->whereBetween($dateField, [$startDate, $endDate]);
        }

        // Get overall statistics
        $totalTrips = $baseQuery->count();
        $totalRevenue = $baseQuery->sum('total_cost') ?? 0;
        $totalExpenses = $baseQuery->sum('total_expenses') ?? 0;
        $totalProfit = $baseQuery->sum('profit') ?? 0;
        $avgProfitMargin = $totalRevenue > 0 ? round(($totalProfit / $totalRevenue) * 100, 2) : 0;

        // Domestic vs International Tours
        $tourTypeStats = $baseQuery->clone()
            ->select(
                'tour_type',
                DB::raw('COUNT(*) as count'),
                DB::raw('COALESCE(SUM(total_cost), 0) as revenue'),
                DB::raw('COALESCE(SUM(profit), 0) as profit')
            )
            ->whereNotNull('tour_type')
            ->groupBy('tour_type')
            ->get();

        // Ensure we have both domestic and international data
        $tourTypes = ['Domestic', 'International'];
        $tourTypeCollection = collect($tourTypes)->map(function ($type) use ($tourTypeStats) {
            $existing = $tourTypeStats->firstWhere('tour_type', $type);
            return $existing ?: (object) [
                'tour_type' => $type,
                'count' => 0,
                'revenue' => 0,
                'profit' => 0
            ];
        });

        // Booking Status Distribution
        $bookingStatusStats = $baseQuery->clone()
            ->select(
                'booking_status',
                DB::raw('COUNT(*) as count'),
                DB::raw('COALESCE(SUM(total_cost), 0) as revenue')
            )
            ->groupBy('booking_status')
            ->get();

        // Ensure we have both pending and booked data
        $statuses = ['Pending', 'Booked'];
        $bookingStatusCollection = collect($statuses)->map(function ($status) use ($bookingStatusStats) {
            $existing = $bookingStatusStats->firstWhere('booking_status', $status);
            return $existing ?: (object) [
                'booking_status' => $status,
                'count' => 0,
                'revenue' => 0
            ];
        });

        // Monthly trends based on selected date range and field
        $startMonth = Carbon::parse($startDate);
        $endMonth = Carbon::parse($endDate);

        $monthlyTrends = $baseQuery->clone()
            ->select(
                DB::raw("DATE_FORMAT({$dateField}, '%Y-%m') as month"),
                DB::raw('COUNT(*) as total_trips'),
                DB::raw('COALESCE(SUM(total_cost), 0) as total_revenue'),
                DB::raw('COALESCE(SUM(total_expenses), 0) as total_expenses'),
                DB::raw('COALESCE(SUM(profit), 0) as total_profit')
            )
            ->whereBetween($dateField, [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Create complete month range
        $monthlyData = collect();
        $current = $startMonth->copy();

        while ($current <= $endMonth) {
            $monthKey = $current->format('Y-m');
            $existing = $monthlyTrends->get($monthKey);

            $monthlyData->push($existing ?: (object) [
                'month' => $monthKey,
                'total_trips' => 0,
                'total_revenue' => 0,
                'total_expenses' => 0,
                'total_profit' => 0
            ]);

            $current->addMonth();
        }

        // Agent-wise report data
        $agentReport = $baseQuery->clone()
            ->select(
                'agent_name',
                DB::raw('COUNT(*) as total_trips'),
                DB::raw('COALESCE(SUM(total_cost), 0) as total_sales'),
                DB::raw('COALESCE(SUM(profit), 0) as total_profit'),
                DB::raw('COALESCE(AVG(profit), 0) as avg_profit')
            )
            ->whereNotNull('agent_name')
            ->groupBy('agent_name')
            ->orderByDesc('total_profit')
            ->get();

        // Recent trips (within date range)
        $recentTrips = $baseQuery->clone()
            ->latest('created_at')
            ->take(5)
            ->get();

        // Top performing tours by profit (within date range)
        $topTours = $baseQuery->clone()
            ->select('trip_name', 'profit', 'tour_type', 'booking_status')
            ->orderByDesc('profit')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'agentReport',
            'monthlyData',
            'tourTypeCollection',
            'bookingStatusCollection',
            'totalTrips',
            'totalRevenue',
            'totalExpenses',
            'totalProfit',
            'avgProfitMargin',
            'recentTrips',
            'topTours',
            'startDate',
            'endDate',
            'dateField'
        ));
    }
}