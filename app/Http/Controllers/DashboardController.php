<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'administrator') {
            $title = 'Administrator Dashboard';

            return view('admin.index', compact('title'));
        } elseif (Auth::user()->role === 'receptionist') {
            $title = 'Receptionist Dashboard';

            return view('receptionist.index', compact('title'));
        } else {
            $title = 'Guest Dashboard';
            $reservations = Booking::where('user_id', Auth::user()->id)->get();

            return view('hotel_guest.index', compact('title', 'reservations'));
        }
    }

    public function show(Booking $reservation)
    {
        $title = "Detail";

        return view('hotel_guest.detail', compact('title', 'reservation'));
    }
}
