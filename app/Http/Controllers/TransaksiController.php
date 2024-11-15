<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;
use App\Models\Transaction; // Transaction model
use Illuminate\Support\Facades\Auth; // For authenticated user

class TransaksiController extends Controller
{

    public function index($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view("user.transaksi", compact('mobil'));
        
    }

    // Method to show a specific transaction
    public function show($id)
    {
        // Fetch the transaction by its ID
        $transaction = Transaction::findOrFail($id);
        
        // Return the view with the transaction data
        return view('transaksi.show', compact('transaction'));
    }

    // Display the transaction page for a specific car and process the transaction
    public function transaksi(Request $request, $mobil)
    {
        // Fetch the car (mobil) by its ID

        // If the request is a POST request, process the transaction
        if ($request->isMethod('post')) {
            // Validate the input rental days
            $validated = $request->validate([
                'rental_days' => 'required|integer|min:1', // Ensure the rental days is a valid positive integer
            ]);

            // Calculate the total cost
            $totalCost = $mobil->harga_sewa_per_hari * $validated['rental_days'];

            // Begin a database transaction to ensure data integrity
            DB::beginTransaction();
            try {
                // Create a new transaction and associate it with the authenticated user
                $transaction = Transaction::create([
                    'mobil_id' => $mobil->id,
                    'user_id' => Auth::id(), // Get the authenticated user's ID
                    'rental_days' => $validated['rental_days'],
                    'total_cost' => $totalCost,
                    'status' => 'disewa', // Set initial status to "disewa" (rented)
                ]);

                // Update the car's availability status to "disewa"
                $mobil->update(['status_ketersediaan' => 'disewa']);

                // Commit the transaction if everything is successful
                DB::commit();

                // Redirect to a dashboard or list with success message
                return redirect()->route('dashboard')->with('success', 'Transaksi berhasil dibuat!');
            } catch (\Exception $e) {
                // Rollback the transaction in case of an error
                DB::rollBack();

                // Return back with error message
                return back()->with('error', 'Gagal melakukan transaksi: ' . $e->getMessage());
            }
        }

        // Return the view with the car data for transaction (for GET request)
        return view('user.transaksi', compact('mobil'));

    }
}
