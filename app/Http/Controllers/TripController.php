<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trips = QueryBuilder::for(Trip::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'trip_name',
                'guest_name',
                'guest_email',
                'guest_contact',
                AllowedFilter::exact('check_in_date'),
                AllowedFilter::exact('booking_date'),
                AllowedFilter::callback('total_cost', function ($query, $value) {
                    $query->where('total_cost', '>=', $value[0] ?? 0)
                        ->where('total_cost', '<=', $value[1] ?? PHP_INT_MAX);
                }),
                AllowedFilter::callback('total_expenses', function ($query, $value) {
                    $query->where('total_expenses', '>=', $value[0] ?? 0)
                        ->where('total_expenses', '<=', $value[1] ?? PHP_INT_MAX);
                }),
                AllowedFilter::callback('profit', function ($query, $value) {
                    $query->where('profit', '>=', $value[0] ?? 0)
                        ->where('profit', '<=', $value[1] ?? PHP_INT_MAX);
                }),
                'agent_name',
                AllowedFilter::exact('booking_status'),
            ])
            ->allowedSorts([
                'id', 'trip_name', 'guest_name', 'check_in_date', 'booking_date',
                'total_cost', 'total_expenses', 'profit', 'agent_name', 'booking_status'
            ])
            ->paginate($request->input('per_page', 50))
            ->appends($request->query());

        return view('trip.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            if ($request->hasFile('path_attachment_create')) {
                $file_path = $request->file('path_attachment_create')->store('path_attachment_create', 'public');
                $request->merge(['path_attachment' => $file_path]);
            }

            $trip = Trip::create($request->all());
            DB::commit();
            session()->flash('success', 'Trip created successfully.');
            return redirect()->route('trip.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        return view('trip.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        return view('trip.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $trip->update($request->all());
            DB::commit();
            session()->flash('success', 'Trip successfully updated.');
            return redirect()->route('trip.edit', $trip->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        DB::beginTransaction();
        try {
            $trip->delete();
            DB::commit();
            session()->flash('success', 'Trip deleted successfully.');
            return redirect()->route('trip.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
