<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('mobil.edit', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Menggunakan method PUT untuk update data -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Nama Mobil -->
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-semibold">Nama Mobil</label>
                                <input type="text" name="nama" id="nama"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('nama', $mobil->nama) }}" required>
                                @error('nama')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Merek -->
                            <div class="mb-4">
                                <label for="merek" class="block text-gray-700 font-semibold">Merek</label>
                                <input type="text" name="merek" id="merek"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('merek', $mobil->merek) }}" required>
                                @error('merek')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tipe -->
                            <div class="mb-4">
                                <label for="tipe" class="block text-gray-700 font-semibold">Tipe</label>
                                <input type="text" name="tipe" id="tipe"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('tipe', $mobil->tipe) }}" required>
                                @error('tipe')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tahun Produksi -->
                            <div class="mb-4">
                                <label for="tahun_produksi" class="block text-gray-700 font-semibold">Tahun Produksi</label>
                                <input type="number" name="tahun_produksi" id="tahun_produksi"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('tahun_produksi', $mobil->tahun_produksi) }}" required>
                                @error('tahun_produksi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- No Polisi -->
                            <div class="mb-4">
                                <label for="no_polisi" class="block text-gray-700 font-semibold">No Polisi</label>
                                <input type="text" name="no_polisi" id="no_polisi"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('no_polisi', $mobil->no_polisi) }}" required>
                                @error('no_polisi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Kapasitas Penumpang -->
                            <div class="mb-4">
                                <label for="kapasitas_penumpang" class="block text-gray-700 font-semibold">Kapasitas Penumpang</label>
                                <input type="number" name="kapasitas_penumpang" id="kapasitas_penumpang"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('kapasitas_penumpang', $mobil->kapasitas_penumpang) }}" required>
                                @error('kapasitas_penumpang')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Transmisi -->
                            <div class="mb-4">
                                <label for="transmisi" class="block text-gray-700 font-semibold">Transmisi</label>
                                <select name="transmisi" id="transmisi"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                                    <option value="manual" {{ old('transmisi', $mobil->transmisi) == 'manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="otomatis" {{ old('transmisi', $mobil->transmisi) == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
                                </select>
                                @error('transmisi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Jenis Bahan Bakar -->
                            <div class="mb-4">
                                <label for="jenis_bahan_bakar" class="block text-gray-700 font-semibold">Jenis Bahan Bakar</label>
                                <select name="jenis_bahan_bakar" id="jenis_bahan_bakar"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                                    <option value="bensin" {{ old('jenis_bahan_bakar', $mobil->jenis_bahan_bakar) == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                    <option value="solar" {{ old('jenis_bahan_bakar', $mobil->jenis_bahan_bakar) == 'solar' ? 'selected' : '' }}>Solar</option>
                                    <option value="listrik" {{ old('jenis_bahan_bakar', $mobil->jenis_bahan_bakar) == 'listrik' ? 'selected' : '' }}>Listrik</option>
                                </select>
                                @error('jenis_bahan_bakar')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Harga Sewa Per Hari -->
                            <div class="mb-4">
                                <label for="harga_sewa_per_hari" class="block text-gray-700 font-semibold">Harga Sewa Per Hari</label>
                                <input type="number" name="harga_sewa_per_hari" id="harga_sewa_per_hari"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    value="{{ old('harga_sewa_per_hari', $mobil->harga_sewa_per_hari) }}" required>
                                @error('harga_sewa_per_hari')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status Ketersediaan -->
                            <div class="mb-4">
                                <label for="status_ketersediaan" class="block text-gray-700 font-semibold">Status Ketersediaan</label>
                                <select name="status_ketersediaan" id="status_ketersediaan"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                                    <option value="tersedia" {{ old('status_ketersediaan', $mobil->status_ketersediaan) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="disewa" {{ old('status_ketersediaan', $mobil->status_ketersediaan) == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                    <option value="perbaikan" {{ old('status_ketersediaan', $mobil->status_ketersediaan) == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                </select>
                                @error('status_ketersediaan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4">
                                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg">Update Mobil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
