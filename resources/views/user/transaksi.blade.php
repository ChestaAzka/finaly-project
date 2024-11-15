<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi untuk Mobil: ' . $mobil->nama) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl">
                <div class="p-6 space-y-6">
                    @if (session('success'))
                        <!-- Success Message with Check Icon -->
                        <div class="flex justify-center items-center bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>

                        <!-- Redirect to Index Page after 3 seconds -->
                        <script>
                            setTimeout(function() {
                                window.location.href = "{{ route('dashboard') }}";
                            }, 3000);
                        </script>
                    @else
                        <!-- Car Summary Section and Transaction Form -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Car Image -->
                            <div class="relative rounded-lg shadow-lg">
                                <img src="{{ $mobil->gambar ? Storage::url($mobil->gambar) : asset('images/default-car.png') }}" 
                                     alt="{{ $mobil->nama }}" 
                                     class="w-full h-64 object-cover rounded-xl">
                                <div class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-t from-black via-transparent to-transparent rounded-xl p-4 flex flex-col justify-end">
                                    <h3 class="text-2xl font-bold text-white">{{ $mobil->nama }}</h3>
                                </div>
                            </div>

                            <!-- Car Details -->
                            <div class="text-lg text-gray-700 space-y-2">
                                <p><strong class="text-xl font-semibold">Merek:</strong> {{ $mobil->merek }}</p>
                                <p><strong class="text-xl font-semibold">Tipe:</strong> {{ $mobil->tipe }}</p>
                                <p><strong class="text-xl font-semibold">Harga Sewa per Hari:</strong> Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <!-- Transaksi Form -->
                        <form action="{{ route('booking') }}" method="post" class="space-y-6">
                            @csrf
                            <!-- Hidden Mobil ID -->
                            <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">

                            <!-- Rental Duration Input -->
                            <div class="flex flex-col space-y-2">
                                <label for="rental_days" class="text-lg font-semibold text-gray-800">Durasi Sewa (Hari)</label>
                                <input type="number" id="rental_days_input" name="rental_days" min="1" required class="w-full p-4 border border-gray-300 rounded-lg shadow-sm" placeholder="Masukkan jumlah hari">
                            </div>

                            <!-- Total Cost Display -->
                            <div class="text-center text-2xl font-bold text-gray-900">
                                <p><strong>Total Biaya:</strong> <span id="total_cost">Rp 0</span></p>
                            </div>

                            <!-- Confirm Button -->
                            <div class="flex justify-center">
                                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white text-lg font-semibold rounded-full shadow-lg hover:scale-105 hover:from-blue-600 hover:to-blue-400 transition duration-300 transform">
                                    Konfirmasi Transaksi
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to dynamically calculate total cost -->
    <script>
        document.getElementById('rental_days_input').addEventListener('input', function () {
            const pricePerDay = {{ $mobil->harga_sewa_per_hari }};
            const days = parseInt(this.value) || 0;
            const totalCost = pricePerDay * days;
            document.getElementById('total_cost').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(totalCost);
        });
    </script>
</x-app-layout>
