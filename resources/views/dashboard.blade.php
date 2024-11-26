<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-gray-800 leading-tight tracking-wide">
            {{ __('🚗 Discover Your Dream Car') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-50 via-blue-100 to-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <!-- Search Section -->
                    <div class="mb-12 flex flex-col md:flex-row items-center justify-between gap-6">
                        <h3 class="text-3xl font-bold text-gray-900 tracking-wide">
                            🔍 Explore Our Exclusive Cars Collection
                        </h3>
                        <form method="GET" action="{{ route('user.cars') }}" class="flex items-center gap-4 w-full md:w-auto">
                            <div class="relative flex-grow">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"
                                    placeholder="Search by name, brand, or type">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <button
                                type="submit"
                                class="px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-full shadow-md hover:bg-blue-700 transition-all duration-300">
                                Search
                            </button>
                        </form>
                    </div>

                    <!-- Cars Listing -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($mobils as $mobil)
                            <div class="bg-gray-50 border border-gray-200 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                                <!-- Car Image -->
                                <div class="relative">
                                    <img class="w-full h-60 object-cover" src="{{ Storage::url($mobil->gambar) }}" alt="{{ $mobil->nama }}">
                                    <span class="absolute top-3 left-3 px-4 py-1 bg-blue-600 text-white text-xs font-medium rounded-md shadow-sm">
                                        {{ ucfirst($mobil->status_ketersediaan) }}
                                    </span>
                                </div>

                                <!-- Car Details -->
                                <div class="p-6">
                                    <h5 class="text-2xl font-bold text-gray-900">{{ $mobil->nama }}</h5>
                                    <p class="text-sm text-gray-700 mt-3 flex items-center gap-2">
                                        <i class="fas fa-tag text-blue-500"></i>
                                        <strong>Brand:</strong> {{ $mobil->merek }}
                                    </p>
                                    <p class="text-sm text-gray-700 flex items-center gap-2">
                                        <i class="fas fa-car text-blue-500"></i>
                                        <strong>Type:</strong> {{ $mobil->tipe }}
                                    </p>
                                    <p class="text-sm text-gray-700 flex items-center gap-2">
                                        <i class="fas fa-calendar-alt text-blue-500"></i>
                                        <strong>Year:</strong> {{ $mobil->tahun_produksi }}
                                    </p>
                                    <p class="text-lg font-bold text-blue-600 mt-5">
                                        Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }} <span class="text-sm text-gray-500">/day</span>
                                    </p>
                                </div>

                                <!-- Call-to-Actions -->
                                <div class="p-4 bg-gray-100 flex justify-between items-center rounded-b-xl">
                                    <a href="{{ route('user.details', $mobil->id) }}"
                                        class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-md shadow-md hover:bg-blue-600 transition-all duration-300">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </a>
                                    <a href="https://wa.me/62xxxxxxxxxx?text=Hi,%20I%20am%20interested%20in%20the%20car:%20{{ urlencode($mobil->nama) }}"
                                        target="_blank"
                                        class="flex items-center gap-2 px-4 py-2 bg-green-500 text-white text-sm font-semibold rounded-md shadow-md hover:bg-green-600 transition-all duration-300">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-600 mt-12">
                                <p class="text-xl font-medium">No cars found matching your search criteria.</p>
                                <p>Try a different keyword or browse our full collection.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
