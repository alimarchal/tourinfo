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
        // Handle AJAX request for monthly data
        if ($request->has('ajax') && $request->has('month')) {
            return $this->getMonthlyData($request);
        }

        // Get date filters from request
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $dateField = $request->get('date_field', 'booking_date');

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

        // Get overall statistics - FIXED: Handle NULL values properly
        $totalTrips = $baseQuery->count();
        $totalRevenue = $baseQuery->whereNotNull('total_cost')->sum('total_cost') ?? 0;
        $totalExpenses = $baseQuery->whereNotNull('total_expenses')->sum('total_expenses') ?? 0;
        $totalProfit = $baseQuery->whereNotNull('profit')->sum('profit') ?? 0;
        $avgProfitMargin = $totalRevenue > 0 ? round(($totalProfit / $totalRevenue) * 100, 2) : 0;

        // FIXED: Tour Type Distribution - Handle NULL values separately
        $tourTypeStats = collect();
        
        // Get Domestic trips
        $domesticStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where('tour_type', 'Domestic')
            ->selectRaw('
                "Domestic" as tour_type,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue,
                COALESCE(SUM(profit), 0) as profit
            ')
            ->first();
        if ($domesticStats) $tourTypeStats->push($domesticStats);
        
        // Get International trips
        $internationalStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where('tour_type', 'International')
            ->selectRaw('
                "International" as tour_type,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue,
                COALESCE(SUM(profit), 0) as profit
            ')
            ->first();
        if ($internationalStats) $tourTypeStats->push($internationalStats);
        
        // Get NULL/empty trips
        $notSetStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where(function($q) {
                $q->whereNull('tour_type')->orWhere('tour_type', '');
            })
            ->selectRaw('
                "Not Set" as tour_type,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue,
                COALESCE(SUM(profit), 0) as profit
            ')
            ->first();
        if ($notSetStats && $notSetStats->count > 0) $tourTypeStats->push($notSetStats);

        $tourTypes = ['Domestic', 'International', 'Not Set'];
        $tourTypeCollection = collect($tourTypes)->map(function ($type) use ($tourTypeStats) {
            $existing = $tourTypeStats->firstWhere('tour_type', $type);
            return $existing ?: (object) [
                'tour_type' => $type,
                'count' => 0,
                'revenue' => 0,
                'profit' => 0
            ];
        });

        // FIXED: Booking Status Distribution - Handle NULL values separately  
        $bookingStatusStats = collect();
        
        // Get Pending bookings
        $pendingStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where('booking_status', 'Pending')
            ->selectRaw('
                "Pending" as booking_status,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue
            ')
            ->first();
        if ($pendingStats) $bookingStatusStats->push($pendingStats);
        
        // Get Booked bookings
        $bookedStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where('booking_status', 'Booked')
            ->selectRaw('
                "Booked" as booking_status,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue
            ')
            ->first();
        if ($bookedStats) $bookingStatusStats->push($bookedStats);
        
        // Get NULL/empty bookings
        $notSetBookingStats = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->where(function($q) {
                $q->whereNull('booking_status')->orWhere('booking_status', '');
            })
            ->selectRaw('
                "Not Set" as booking_status,
                COUNT(*) as count,
                COALESCE(SUM(total_cost), 0) as revenue
            ')
            ->first();
        if ($notSetBookingStats && $notSetBookingStats->count > 0) $bookingStatusStats->push($notSetBookingStats);

        $statuses = ['Pending', 'Booked', 'Not Set'];
        $bookingStatusCollection = collect($statuses)->map(function ($status) use ($bookingStatusStats) {
            $existing = $bookingStatusStats->firstWhere('booking_status', $status);
            return $existing ?: (object) [
                'booking_status' => $status,
                'count' => 0,
                'revenue' => 0
            ];
        });

        // Monthly trends - FIXED: Use direct query
        $startMonth = Carbon::parse($startDate);
        $endMonth = Carbon::parse($endDate);

        $monthlyTrends = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->select(
                DB::raw("DATE_FORMAT({$dateField}, '%Y-%m') as month"),
                DB::raw('COUNT(*) as total_trips'),
                DB::raw('COALESCE(SUM(CASE WHEN total_cost IS NOT NULL THEN total_cost ELSE 0 END), 0) as total_revenue'),
                DB::raw('COALESCE(SUM(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as total_profit')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $monthlyData = collect();
        $current = $startMonth->copy();

        while ($current <= $endMonth) {
            $monthKey = $current->format('Y-m');
            $existing = $monthlyTrends->get($monthKey);

            $monthlyData->push($existing ?: (object) [
                'month' => $monthKey,
                'total_trips' => 0,
                'total_revenue' => 0,
                'total_profit' => 0
            ]);

            $current->addMonth();
        }

        // FIXED: Agent-wise report - Use direct query
        $agentReport = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->select(
                'agent_name',
                DB::raw('COUNT(*) as total_trips'),
                DB::raw('COALESCE(SUM(CASE WHEN total_cost IS NOT NULL AND total_cost > 0 THEN total_cost ELSE 0 END), 0) as total_sales'),
                DB::raw('COALESCE(SUM(CASE WHEN total_expenses IS NOT NULL THEN total_expenses ELSE 0 END), 0) as total_expenses'),
                DB::raw('COALESCE(SUM(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as total_profit'),
                DB::raw('COALESCE(AVG(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as avg_profit')
            )
            ->whereNotNull('agent_name')
            ->where('agent_name', '!=', '')
            ->groupBy('agent_name')
            ->orderByDesc('total_profit')
            ->get()
            ->map(function ($agent) {
                // FIXED: More robust data validation
                $totalSales = (float) $agent->total_sales;
                $totalProfit = (float) $agent->total_profit;
                
                // If profit exceeds sales, cap it at sales value
                if ($totalProfit > $totalSales && $totalSales > 0) {
                    \Log::warning("Data integrity issue: Agent {$agent->agent_name} has profit ({$totalProfit}) > sales ({$totalSales}). Capping profit to sales.");
                    $agent->total_profit = $totalSales;
                    $totalProfit = $totalSales;
                }
                
                // Handle cases where sales is 0 but profit exists (data error)
                if ($totalSales == 0 && $totalProfit > 0) {
                    \Log::warning("Data integrity issue: Agent {$agent->agent_name} has profit ({$totalProfit}) but no sales. Setting profit to 0.");
                    $agent->total_profit = 0;
                    $totalProfit = 0;
                }
                
                // Calculate profit margin
                $agent->profit_margin = $totalSales > 0 ? 
                    round(($totalProfit / $totalSales) * 100, 2) : 0;
                
                // Ensure all values are properly formatted numbers
                $agent->total_sales = round($totalSales, 2);
                $agent->total_profit = round($totalProfit, 2);
                $agent->total_expenses = round((float) $agent->total_expenses, 2);
                $agent->avg_profit = round((float) $agent->avg_profit, 2);
                
                return $agent;
            })
            ->filter(function ($agent) {
                // Filter out agents with no meaningful data
                return $agent->total_trips > 0;
            });

        // Recent trips - FIXED: Use direct query
        $recentTrips = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->whereNotNull('trip_name')
            ->latest('created_at')
            ->take(5)
            ->get();

        // Top performing tours - FIXED: Use direct query
        $topTours = Trip::whereBetween($dateField, [$startDate, $endDate])
            ->select('trip_name', 'profit', 'tour_type', 'booking_status')
            ->whereNotNull('profit')
            ->whereNotNull('trip_name')
            ->where('profit', '>', 0)
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

    private function getMonthlyData(Request $request)
    {
        $month = $request->get('month');
        $dateField = $request->get('date_field', 'booking_date');
        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();

        // FIXED: Better NULL handling in monthly data
        $monthlyStats = Trip::whereBetween($dateField, [$startOfMonth, $endOfMonth])
            ->selectRaw('
                COUNT(*) as total_trips,
                COALESCE(SUM(CASE WHEN total_cost IS NOT NULL THEN total_cost ELSE 0 END), 0) as total_revenue,
                COALESCE(SUM(CASE WHEN total_expenses IS NOT NULL THEN total_expenses ELSE 0 END), 0) as total_expenses,
                COALESCE(SUM(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as total_profit
            ')
            ->first();

        $agentData = Trip::whereBetween($dateField, [$startOfMonth, $endOfMonth])
            ->select(
                'agent_name',
                DB::raw('COUNT(*) as total_trips'),
                DB::raw('COALESCE(SUM(CASE WHEN total_cost IS NOT NULL AND total_cost > 0 THEN total_cost ELSE 0 END), 0) as total_sales'),
                DB::raw('COALESCE(SUM(CASE WHEN total_expenses IS NOT NULL THEN total_expenses ELSE 0 END), 0) as total_expenses'),
                DB::raw('COALESCE(SUM(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as total_profit'),
                DB::raw('COALESCE(AVG(CASE WHEN profit IS NOT NULL THEN profit ELSE 0 END), 0) as avg_profit')
            )
            ->whereNotNull('agent_name')
            ->where('agent_name', '!=', '')
            ->groupBy('agent_name')
            ->orderByDesc('total_trips')
            ->get()
            ->map(function ($agent) {
                // FIXED: Same validation for monthly data
                $totalSales = (float) $agent->total_sales;
                $totalProfit = (float) $agent->total_profit;
                
                if ($totalProfit > $totalSales && $totalSales > 0) {
                    $agent->total_profit = $totalSales;
                } elseif ($totalSales == 0 && $totalProfit > 0) {
                    $agent->total_profit = 0;
                }
                
                return $agent;
            });

        $topAgent = $agentData->first();

        return response()->json([
            'totalTrips' => $monthlyStats->total_trips ?? 0,
            'totalRevenue' => $monthlyStats->total_revenue ?? 0,
            'totalProfit' => $monthlyStats->total_profit ?? 0,
            'topAgent' => $topAgent ? "{$topAgent->agent_name} ({$topAgent->total_trips} trips)" : 'No Data',
            'agentData' => $agentData->toArray()
        ]);
    }
}