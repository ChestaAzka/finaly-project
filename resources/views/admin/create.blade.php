<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-teal-800 leading-tight">
            {{ __('Tambah Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-50 via-teal-50 to-green-50 shadow-xl rounded-lg">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <!-- Nama Mobil -->
                            <div class="mb-6">
                                <label for="nama" class="block text-teal-600 font-semibold">Nama Mobil</label>
                                <input type="text" name="nama" id="nama" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Merek -->
                            <div class="mb-6">
                                <label for="merek" class="block text-teal-600 font-semibold">Merek</label>
                                <input type="text" name="merek" id="merek" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('merek') }}" required>
                                @error('merek')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-6">
                                <label for="deskripsi" class="block text-teal-600 font-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('deskripsi') }}" required></textarea>
                                @error('deskripsi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tipe -->
                            <div class="mb-6">
                                <label for="tipe" class="block text-teal-600 font-semibold">Tipe</label>
                                <input type="text" name="tipe" id="tipe" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('tipe') }}" required>
                                @error('tipe')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tahun Produksi -->
                            <div class="mb-6">
                                <label for="tahun_produksi" class="block text-teal-600 font-semibold">Tahun Produksi</label>
                                <input type="number" name="tahun_produksi" id="tahun_produksi" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('tahun_produksi') }}" required>
                                @error('tahun_produksi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- No Polisi -->
                            <div class="mb-6">
                                <label for="no_polisi" class="block text-teal-600 font-semibold">No Polisi</label>
                                <input type="text" name="no_polisi" id="no_polisi" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('no_polisi') }}" required>
                                @error('no_polisi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Kapasitas Penumpang -->
                            <div class="mb-6">
                                <label for="kapasitas_penumpang" class="block text-teal-600 font-semibold">Kapasitas Penumpang</label>
                                <input type="number" name="kapasitas_penumpang" id="kapasitas_penumpang" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('kapasitas_penumpang') }}" required>
                                @error('kapasitas_penumpang')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Transmisi -->
                            <div class="mb-6">
                                <label for="transmisi" class="block text-teal-600 font-semibold">Transmisi</label>
                                <select name="transmisi" id="transmisi" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" required>
                                    <option value="manual" {{ old('transmisi') == 'manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="otomatis" {{ old('transmisi') == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
                                </select>
                                @error('transmisi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Jenis Bahan Bakar -->
                            <div class="mb-6">
                                <label for="jenis_bahan_bakar" class="block text-teal-600 font-semibold">Jenis Bahan Bakar</label>
                                <select name="jenis_bahan_bakar" id="jenis_bahan_bakar" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" required>
                                    <option value="bensin" {{ old('jenis_bahan_bakar') == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                    <option value="solar" {{ old('jenis_bahan_bakar') == 'solar' ? 'selected' : '' }}>Solar</option>
                                    <option value="listrik" {{ old('jenis_bahan_bakar') == 'listrik' ? 'selected' : '' }}>Listrik</option>
                                </select>
                                @error('jenis_bahan_bakar')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Harga Sewa Per Hari -->
                            <div class="mb-6">
                                <label for="harga_sewa_per_hari" class="block text-teal-600 font-semibold">Harga Sewa per Hari (Rp)</label>
                                <input type="number" name="harga_sewa_per_hari" id="harga_sewa_per_hari" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" value="{{ old('harga_sewa_per_hari') }}" required>
                                @error('harga_sewa_per_hari')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status Ketersediaan -->
                            <div class="mb-6">
                                <label for="status_ketersediaan" class="block text-teal-600 font-semibold">Status Ketersediaan</label>
                                <select name="status_ketersediaan" id="status_ketersediaan" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500" required>
                                    <option value="tersedia" {{ old('status_ketersediaan') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="disewa" {{ old('status_ketersediaan') == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                    <option value="perbaikan" {{ old('status_ketersediaan') == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                </select>
                                @error('status_ketersediaan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Gambar Mobil -->
                            <div class="mb-6">
                                <label for="gambar" class="block text-teal-600 font-semibold">Foto Mobil</label>
                                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full px-4 py-2 border border-teal-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                @error('gambar')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-8 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-all ease-in-out">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
