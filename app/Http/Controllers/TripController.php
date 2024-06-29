<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
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
        $validated = $request->validate([
            'trip_name' => 'required|string|max:255',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|string|email|max:255',
            'guest_contact' => 'required|string|max:255',
            'check_in_date' => 'required|date',
            'booking_date' => 'required|date',
            'total_cost' => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'profit' => 'required|numeric',
            'agent_name' => 'required|string|max:255',
            'booking_status' => 'required|in:Pending,Booked',
        ]);

        DB::beginTransaction();
        try {
            $trip = Trip::create($request->all());
            DB::commit();
            session()->flash('success', 'Trip created successfully.');
            return to_route('trip.index');
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
        //
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

        $validated = $request->validate([
            'trip_name' => 'required|string|max:255',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|string|email|max:255',
            'guest_contact' => 'required|string|max:255',
            'check_in_date' => 'required|date',
            'booking_date' => 'required|date',
            'total_cost' => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'profit' => 'required|numeric',
            'agent_name' => 'required|string|max:255',
            'booking_status' => 'required|in:Pending,Booked',
        ]);

        DB::beginTransaction();
        try {
            $trip->update($request->all());
            DB::commit();
            session()->flash('success', 'Trip successfully updated.');
            return to_route('trip.edit', $trip->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }

        return redirect()->route('trips.index')->with('success', 'Trip successfully updated!');
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
            return to_route('trip.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
