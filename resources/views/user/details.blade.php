<!-- resources/views/mobil/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Details: ' . $mobil->nama) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Card with image and car details -->
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                    <!-- Car Image -->
                    <div class="relative rounded-lg shadow-lg">
                        <img src="{{ Storage::url($mobil->gambar) }}" alt="{{ $mobil->nama }}" class="w-full h-96 object-cover rounded-xl transform hover:scale-105 transition duration-500 ease-in-out">
                        <div class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-t from-black via-transparent to-transparent rounded-xl p-4 flex flex-col justify-end">
                            <h3 class="text-3xl font-bold text-white">{{ $mobil->nama }}</h3>
                        </div>
                    </div>

                    <!-- Car Details Section -->
                    <div class="space-y-6">
                        <div class="text-lg text-gray-700">
                            <p><strong class="text-xl font-semibold text-gray-800">Merek:</strong> {{ $mobil->merek }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Tipe:</strong> {{ $mobil->tipe }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Tahun Produksi:</strong> {{ $mobil->tahun_produksi }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">No Polisi:</strong> {{ $mobil->no_polisi }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Kapasitas Penumpang:</strong> {{ $mobil->kapasitas_penumpang }} Penumpang</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Transmisi:</strong> {{ ucfirst($mobil->transmisi) }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Jenis Bahan Bakar:</strong> {{ ucfirst($mobil->jenis_bahan_bakar) }}</p>
                            <p><strong class="text-xl font-semibold text-gray-800">Status Ketersediaan:</strong> {{ ucfirst($mobil->status_ketersediaan) }}</p>
                        </div>

                        <!-- Rent Button -->
                        <div class="mt-6 flex justify-center">
                            <a href="{{ route('user.details', $mobil->id) }}" class="inline-block px-8 py-3 bg-gradient-to-r from-green-400 to-green-600 text-black text-lg font-semibold rounded-full shadow-lg hover:scale-105 hover:from-green-600 hover:to-green-400 transition duration-300 transform">
                                Rent This Car
                            </a>
                        </div>

                        <!-- Price Section -->
                        <div class="mt-8 text-center text-3xl font-bold text-gray-900">
                            <p><strong>Harga Sewa:</strong> Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }} /day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
