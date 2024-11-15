<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Car Table Card -->
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">All Registered Cars</h3>

                    <!-- Add New Car Button -->
                    <a href="{{ route('admin.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 mb-4 inline-block">Add New Car</a>

                    <!-- Car Table -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Car Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Brand</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price per Day</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($mobils as $mobil)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $mobil->nama }}</td>
                                    <td class="px-6 py-4">{{ $mobil->merek }}</td>
                                    <td class="px-6 py-4">{{ $mobil->tipe }}</td>
                                    <td class="px-6 py-4">{{ $mobil->tahun_produksi }}</td>
                                    <td class="px-6 py-4">Rp {{ number_format($mobil->harga_sewa_per_hari, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 flex space-x-4">
                                        <a href="{{ route('admin.edit', $mobil->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('admin.destroy', $mobil->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
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
</x-app-layout>
