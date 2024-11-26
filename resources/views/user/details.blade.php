<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Car Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Image Section -->
                <div class="relative">
                    <img src="{{ Storage::url($mobil->gambar) }}" alt="{{ $mobil->nama }}"
                        class="w-full h-96 object-cover">
                </div>

                <!-- Details Section -->
                <div class="p-8 space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800">{{ $mobil->nama }}</h3>
                    <p class="text-gray-600">
                        {{ $mobil->deskripsi }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <p class="text-gray-700"><strong>Brand:</strong> {{ $mobil->merek }}</p>
                        <p class="text-gray-700"><strong>Type:</strong> {{ $mobil->tipe }}</p>
                        <p class="text-gray-700"><strong>Year:</strong> {{ $mobil->tahun_produksi }}</p>
                        <p class="text-gray-700"><strong>License Plate:</strong> {{ $mobil->no_polisi }}</p>
                        <p class="text-gray-700"><strong>Passenger Capacity:</strong> {{ $mobil->kapasitas_penumpang }} people</p>
                        <p class="text-gray-700"><strong>Transmission:</strong> {{ ucfirst($mobil->transmisi) }}</p>
                        <p class="text-gray-700"><strong>Fuel Type:</strong> {{ ucfirst($mobil->jenis_bahan_bakar) }}</p>
                        <p class="text-gray-700"><strong>Availability:</strong>
                            <span class="{{ $mobil->status_ketersediaan === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($mobil->status_ketersediaan) }}
                            </span>
                        </p>
                    </div>

                    <div class="text-lg font-semibold text-gray-800 mt-4">
                        <p>Rental Price: Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }} /day</p>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="p-6 bg-gray-100 text-center">
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-md shadow-md hover:bg-blue-700 transition">
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
