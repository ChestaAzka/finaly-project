<!-- resources/views/admin/users/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Table Card -->
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">All Registered Users</h3>
                    
                    <!-- Search Form -->
                    <div class="mb-4">
                        <form method="GET" action="{{ route('admin.users.index') }}" class="flex items-center">
                            <input type="text" name="search" placeholder="Search by name or email..." class="border border-gray-300 rounded-lg px-4 py-2 mr-2 w-64" value="{{ request()->search }}">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Search</button>
                        </form>
                    </div>

                    <!-- User Table -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registered On</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($users as $user)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->role ?? 'User' }}</td>
                                    <td class="px-6 py-4">{{ $user->created_at->format('F j, Y') }}</td>
                                    <td class="px-6 py-4 flex space-x-4">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
