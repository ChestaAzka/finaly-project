<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Car Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Car Table Card -->
            <div class="bg-gradient-to-r from-blue-50 via-teal-100 to-green-100 shadow-lg rounded-lg">
                <div class="p-8">
                    <h3 class="text-3xl font-semibold text-blue-700 mb-6">All Registered Cars</h3>

                    <!-- Add New Car Button -->
                    <a href="{{ route('admin.create') }}" class="inline-block bg-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-teal-500 transition duration-300 ease-in-out transform mb-6">
                        Add New Car
                    </a>

                    <!-- Car Table -->
                    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                        <table class="min-w-full table-auto">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Car Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Brand</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Type</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Year</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Price per Day</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-50">
                                @foreach($mobils as $mobil)
                                    <tr class="border-b hover:bg-teal-50">
                                        <td class="px-6 py-4 text-gray-800">{{ $mobil->nama }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $mobil->merek }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $mobil->tipe }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $mobil->tahun_produksi }}</td>
                                        <td class="px-6 py-4 text-gray-600">Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-gray-600 flex space-x-4">
                                            <a href="{{ route('admin.edit', $mobil->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Edit</a>
                                            <form action="{{ route('admin.destroy', $mobil->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
