<?php


namespace App\Http\Controllers;


use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class BookingsController {
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $b = Booking::find(1);
        $tt = $b->customer->name;
        return view('bookings.index', [ 'bookings' => Booking::paginate(10) ]);
    }
}
