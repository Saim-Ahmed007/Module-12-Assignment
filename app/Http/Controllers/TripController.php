<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    function create (Request $request){
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'locations' => 'required|array',
            'locations.*' => 'exists:locations,id',
        ]);

        // Create a new trip
        $trip = Trip::create([
            'date' => $validatedData['date'],
        ]);

        $trip->locations()->attach($validatedData['locations']);
        return redirect()->route('trips.show', ['trip' => $trip->id])
            ->with('success', 'Trip created successfully!');
    }


    public function showAvailableSeats($tripId)
    {
       
        $trip = Trip::findOrFail($tripId);

        $allSeats = range(1, 36);

        $bookedSeats = $trip->seatAllocations()->pluck('seat_number')->toArray();

        $availableSeats = array_diff($allSeats, $bookedSeats);

        return view('tickets.available_seats', compact('trip', 'availableSeats', 'bookedSeats'));
    }


    public function purchaseTicket($tripId, $seatNumber)
    {

        $trip = Trip::findOrFail($tripId);

        $isSeatAvailable = $trip->isSeatAvailable($seatNumber);

        if (!$isSeatAvailable) {
            return redirect()->route('trips.show', ['trip' => $trip->id])
                ->with('error', 'Selected seat is not available for booking.');
        }

        
        $user = auth()->user();

        SeatAllocation::create([
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'seat_number' => $seatNumber,
        ]);

        return redirect()->route('trips.show', ['trip' => $trip->id])
            ->with('success', 'Ticket purchased successfully.');
    }
}
