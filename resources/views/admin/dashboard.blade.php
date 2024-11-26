<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                <span class="text-blue-600 font-bold">Admin Rental Mobil</span> - Dashboard
            </h2>
            <div class="flex items-center space-x-2">
                <img src="https://img.icons8.com/ios-glyphs/30/000000/car--v1.png" alt="Car Icon">
                <span class="font-semibold text-gray-600 text-lg">Admin Panel</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <!-- Section: Welcome Message -->
                <div class="text-center mb-10">
                    <h3 class="text-3xl font-bold text-gray-700">Selamat Datang, Admin!</h3>
                    <p class="text-gray-600 mt-2">Kelola data rental mobil dengan mudah dan efisien dari dashboard ini.</p>
                </div>

                <!-- Section: Admin Navigation Buttons -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Kelola Mobil (Link menuju daftar mobil) -->
                    <a href="/admin/mobil"
                       class="flex flex-col p-8 bg-blue-500 text-white rounded-lg shadow-xl hover:scale-105 transform transition-all duration-300 ease-in-out hover:bg-blue-600">
                        <div class="flex items-center justify-center mb-4">
                            <img src="https://img.icons8.com/ios-glyphs/40/ffffff/car--v1.png" alt="Car Icon" class="mr-4">
                            <span class="text-xl font-semibold">Kelola Mobil</span>
                        </div>
                        <p class="mt-2 text-sm">Tambah, edit, dan hapus data mobil yang tersedia untuk disewakan.</p>
                    </a>

                    <!-- Kelola Transaksi -->
                    <a href="/admin/transaksi"
                       class="flex flex-col p-8 bg-green-500 text-white rounded-lg shadow-xl hover:scale-105 transform transition-all duration-300 ease-in-out hover:bg-green-600">
                        <div class="flex items-center justify-center mb-4">
                            <img src="https://img.icons8.com/ios-glyphs/40/ffffff/receipt.png" alt="Transaction Icon" class="mr-4">
                            <span class="text-xl font-semibold">Kelola Transaksi</span>
                        </div>
                        <p class="mt-2 text-sm">Lihat dan kelola transaksi sewa mobil pelanggan.</p>
                    </a>

                    <!-- Kelola Pelanggan -->
                    <a href="/admin/users"
                       class="flex flex-col p-8 bg-yellow-500 text-white rounded-lg shadow-xl hover:scale-105 transform transition-all duration-300 ease-in-out hover:bg-yellow-600">
                        <div class="flex items-center justify-center mb-4">
                            <img src="https://img.icons8.com/ios-glyphs/40/ffffff/user-group-man-man.png" alt="Customer Icon" class="mr-4">
                            <span class="text-xl font-semibold">Kelola Pelanggan</span>
                        </div>
                        <p class="mt-2 text-sm">Kelola data pelanggan yang menyewa mobil di perusahaan Anda.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
