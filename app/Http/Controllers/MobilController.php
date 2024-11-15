<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // Menampilkan daftar mobil
    public function index()
    {
        $mobils = Mobil::all();
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
            $gambarPath = $request->file('gambar')->store('public/mobil');
        }

        // Menyimpan data mobil ke database
        Mobil::create(array_merge($validated, ['gambar' => $gambarPath]));

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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek apakah gambar diupdate
        if ($request->hasFile('gambar')) {
            if ($mobil->gambar) {
                \Storage::delete($mobil->gambar);
            }
            $mobil->gambar = $request->file('gambar')->store('public/mobil');
        }

        // Update data mobil
        $mobil->update(array_merge($validated, ['gambar' => $mobil->gambar]));

        return redirect()->route('admin.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    // Menghapus data mobil
    public function destroy(Mobil $mobil)
    {
        if ($mobil->gambar) {
            \Storage::delete($mobil->gambar);
        }
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
