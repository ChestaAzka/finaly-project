<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;  // Ensure you have the Transaction model
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;

class TransaksiController extends Controller
{
    // Menampilkan halaman transaksi untuk mobil
    public function transaksi($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('user.transaksi', compact('mobil'));
    }

    // Proses transaksi untuk mobil
    public function processTransaction(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        // Validasi input durasi sewa
        $validated = $request->validate([
            'rental_days' => 'required|integer|min:1',
        ]);

        // Hitung total biaya
        $totalCost = $mobil->harga_sewa_per_hari * $validated['rental_days'];

        // Mulai transaksi
        DB::beginTransaction();
        try {
            // Buat catatan transaksi
            $transaction = $mobil->transactions()->create([
                'rental_days' => $validated['rental_days'],
                'total_cost' => $totalCost,
                'status' => 'pending', // Status dapat diubah sesuai kebutuhan
            ]);

            // Update status ketersediaan mobil
            $mobil->update(['status_ketersediaan' => 'disewa']);

            DB::commit();
            return redirect()->route('user.details', $mobil->id)->with('success', 'Transaksi berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal melakukan transaksi.');
        }
    }
}
