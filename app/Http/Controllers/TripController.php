<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Initialize the query builder
        $query = Trip::query();

        // Apply filters based on search and other parameters
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('trip_name', 'like', '%' . $search . '%')
                  ->orWhere('guest_name', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('filter_trip_name')) {
            $query->where('trip_name', 'like', '%' . $request->input('filter_trip_name') . '%');
        }

        if ($request->has('filter_guest_name')) {
            $query->where('guest_name', 'like', '%' . $request->input('filter_guest_name') . '%');
        }

        if ($request->has('filter_booking_status')) {
            $query->where('booking_status', $request->input('filter_booking_status'));
        }

        // Fetch the filtered trips
        $trips = $query->get();

        // Return the view with filtered trips
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
