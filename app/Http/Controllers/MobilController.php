<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // Menampilkan daftar mobil
    public function index()
    {
        $mobils = Mobil::all(); // Mengambil semua mobil
        return view('admin.index', compact('mobils'));
    }

    // Menampilkan form untuk menambahkan mobil baru
    public function create()
    {
        return view('admin.create');
    }

    // Menyimpan data mobil baru
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'tahun_produksi' => 'required|integer',
            'no_polisi' => 'required|string|max:15',
            'kapasitas_penumpang' => 'required|integer',
            'transmisi' => 'required|in:manual,otomatis',
            'jenis_bahan_bakar' => 'required|in:bensin,solar,listrik',
            'harga_sewa_per_hari' => 'required|integer',
            'status_ketersediaan' => 'required|in:tersedia,disewa,perbaikan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/mobil'); // Menyimpan gambar di folder public/mobil
        }

        // Menyimpan data mobil ke database
        Mobil::create([
            'nama' => $request->nama,
            'merek' => $request->merek,
            'tipe' => $request->tipe,
            'tahun_produksi' => $request->tahun_produksi,
            'no_polisi' => $request->no_polisi,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'transmisi' => $request->transmisi,
            'jenis_bahan_bakar' => $request->jenis_bahan_bakar,
            'harga_sewa_per_hari' => $request->harga_sewa_per_hari,
            'status_ketersediaan' => $request->status_ketersediaan,
            'gambar' => $gambarPath, // Menyimpan path gambar jika ada
        ]);

        return redirect()->route('admin.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit mobil
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('admin.edit', compact('mobil'));
    }

    // Menyimpan perubahan data mobil
    public function update(Request $request, Mobil $mobil)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'tahun_produksi' => 'required|integer',
            'no_polisi' => 'required|string|max:15',
            'kapasitas_penumpang' => 'required|integer',
            'transmisi' => 'required|in:manual,otomatis',
            'jenis_bahan_bakar' => 'required|in:bensin,solar,listrik',
            'harga_sewa_per_hari' => 'required|numeric',
            'status_ketersediaan' => 'required|in:tersedia,disewa,perbaikan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Cek apakah gambar diupdate
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($mobil->gambar) {
                \Storage::delete($mobil->gambar);
            }

            // Upload gambar baru
            $gambarPath = $request->file('gambar')->store('public/mobil');
            $mobil->gambar = $gambarPath;
        }

        // Update data mobil
        $mobil->update($request->except('gambar')); // Jangan update gambar dari input

        return redirect()->route('admin.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    // Menghapus data mobil
    public function destroy(Mobil $mobil)
    {
        // Hapus gambar jika ada
        if ($mobil->gambar) {
            \Storage::delete($mobil->gambar);
        }

        // Hapus data mobil
        $mobil->delete();
        
        return redirect()->route('admin.index')->with('success', 'Mobil berhasil dihapus!');
    }

    // Menampilkan detail mobil
    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('user.details', compact('mobil'));
    }
}
