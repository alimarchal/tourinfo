<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Get overall statistics
        $totalTrips = Trip::count();
        $totalRevenue = Trip::sum('total_cost');
        $totalExpenses = Trip::sum('total_expenses');
        $totalProfit = Trip::sum('profit');
        $avgProfitMargin = $totalRevenue > 0 ? round(($totalProfit / $totalRevenue) * 100, 2) : 0;

        // Domestic vs International Tours
        $tourTypeStats = Trip::select(
            'tour_type',
            DB::raw('COUNT(*) as count'),
            DB::raw('COALESCE(SUM(total_cost), 0) as revenue'),
            DB::raw('COALESCE(SUM(profit), 0) as profit')
        )
            ->whereNotNull('tour_type')
            ->groupBy('tour_type')
            ->get();

        // If no tour type data, create default data
        if ($tourTypeStats->isEmpty()) {
            $tourTypeStats = collect([
                (object) ['tour_type' => 'Domestic', 'count' => 0, 'revenue' => 0, 'profit' => 0],
                (object) ['tour_type' => 'International', 'count' => 0, 'revenue' => 0, 'profit' => 0]
            ]);
        }

        // Booking Status Distribution
        $bookingStatusStats = Trip::select(
            'booking_status',
            DB::raw('COUNT(*) as count'),
            DB::raw('COALESCE(SUM(total_cost), 0) as revenue')
        )
            ->groupBy('booking_status')
            ->get();

        // If no booking status data, create default data
        if ($bookingStatusStats->isEmpty()) {
            $bookingStatusStats = collect([
                (object) ['booking_status' => 'Pending', 'count' => 0, 'revenue' => 0],
                (object) ['booking_status' => 'Booked', 'count' => 0, 'revenue' => 0]
            ]);
        }

        // Monthly trends for current year
        $monthlyTrends = Trip::select(
            DB::raw('DATE_FORMAT(booking_date, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total_trips'),
            DB::raw('COALESCE(SUM(total_cost), 0) as total_revenue'),
            DB::raw('COALESCE(SUM(total_expenses), 0) as total_expenses'),
            DB::raw('COALESCE(SUM(profit), 0) as total_profit')
        )
            ->whereYear('booking_date', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Create data for all months with 0 values if no data
        if ($monthlyTrends->isEmpty()) {
            $monthlyTrends = collect(range(1, 12))->map(function ($month) {
                return (object) [
                    'month' => Carbon::now()->startOfYear()->addMonths($month - 1)->format('Y-m'),
                    'total_trips' => 0,
                    'total_revenue' => 0,
                    'total_expenses' => 0,
                    'total_profit' => 0
                ];
            });
        }

        // Agent-wise report data
        $agentReport = Trip::select(
            'agent_name',
            DB::raw('COUNT(*) as total_trips'),
            DB::raw('COALESCE(SUM(total_cost), 0) as total_sales'),
            DB::raw('COALESCE(SUM(profit), 0) as total_profit'),
            DB::raw('COALESCE(AVG(profit), 0) as avg_profit')
        )
            ->groupBy('agent_name')
            ->orderByDesc('total_profit')
            ->get();

        // If no agent data, create default data
        if ($agentReport->isEmpty()) {
            $agentReport = collect([
                (object) [
                    'agent_name' => 'No Data',
                    'total_trips' => 0,
                    'total_sales' => 0,
                    'total_profit' => 0,
                    'avg_profit' => 0
                ]
            ]);
        }

        // Recent trips (last 5)
        $recentTrips = Trip::latest('created_at')->take(5)->get();

        // Top performing tours by profit
        $topTours = Trip::select('trip_name', 'profit', 'tour_type', 'booking_status')
            ->orderByDesc('profit')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'agentReport',
            'monthlyTrends',
            'tourTypeStats',
            'bookingStatusStats',
            'totalTrips',
            'totalRevenue',
            'totalExpenses',
            'totalProfit',
            'avgProfitMargin',
            'recentTrips',
            'topTours'
        ));
    }
}
