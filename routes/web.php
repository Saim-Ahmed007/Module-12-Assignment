<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/trips/create',[TripController::class,'create']);
Route::post('/trips', [TripController::class,'store'] );
Route::get('/trips/{trip}/seats', [TripController::class,'showAvailableSeats']);
Route::post('/trips/{trip}/seats/{seat}', [TripController::class,'purchaseTicket']);



