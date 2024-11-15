<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Cars for Rent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Landing Page Section -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-gray-800 mb-6">Browse Our Cars</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($mobils as $mobil)
                                <div class="bg-white border rounded-lg shadow-lg overflow-hidden transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                    <!-- Car Image -->
                                    <img class="w-full h-56 object-cover" src="{{ Storage::url($mobil->gambar) }}" alt="{{ $mobil->nama }}">

                                    <!-- Car Details -->
                                    <div class="p-4">
                                        <h5 class="text-xl font-bold text-gray-800">{{ $mobil->nama }}</h5>
                                        <p class="text-gray-600">Merek: {{ $mobil->merek }}</p>
                                        <p class="text-gray-600">Tipe: {{ $mobil->tipe }}</p>
                                        <p class="text-gray-600">Tahun Produksi: {{ $mobil->tahun_produksi }}</p>
                                        <p class="text-gray-600 mb-4">Harga Sewa: Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }} /day</p>

                                        <!-- Button to Rent or View Details -->
                                        <a href="{{ route('user.details', $mobil->id) }}" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
