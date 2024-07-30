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
        // Agent-wise report data
        $agentReport = Trip::select('agent_name',
            DB::raw('COUNT(*) as total_trips'),
            DB::raw('COALESCE(SUM(total_cost), 0) as total_sales'),
            DB::raw('COALESCE(SUM(profit), 0) as total_profit'))
            ->groupBy('agent_name')
            ->get();

        // If no data, create an empty collection with one item
        if ($agentReport->isEmpty()) {
            $agentReport = collect([
                (object)[
                    'agent_name' => 'No Data',
                    'total_trips' => 0,
                    'total_sales' => 0,
                    'total_profit' => 0
                ]
            ]);
        }

        // Monthly profit report data
        $monthlyProfit = Trip::select(
            DB::raw('DATE_FORMAT(booking_date, "%Y-%m") as month'),
            DB::raw('COALESCE(SUM(profit), 0) as total_profit')
        )
            ->whereYear('booking_date', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // If no monthly data, create data for all months with 0 profit
        if ($monthlyProfit->isEmpty()) {
            $monthlyProfit = collect(range(1, 12))->map(function ($month) {
                return (object)[
                    'month' => Carbon::now()->startOfYear()->addMonths($month - 1)->format('Y-m'),
                    'total_profit' => 0
                ];
            });
        }


//dd($agentReport);
        return view('dashboard', compact('agentReport', 'monthlyProfit'));
    }
}
