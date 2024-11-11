<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all mobil data (cars) from the database
        $mobils = Mobil::all();

        // Pass the data to the view
        return view('dashboard', compact('mobils'));
    }
}
