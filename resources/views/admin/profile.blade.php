<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
    @include('admin.header')
    @include('admin.sidebar')

    <div class="p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">User Management</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $user->id }}</td>
                            <td class="py-3 px-6">{{ $user->name }}</td>
                            <td class="py-3 px-6">{{ $user->email }}</td>
                            <td class="py-3 px-6">
                                <div x-data="{ edit: false }">
                                    <button @click="edit = !edit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Edit</button>
                                    
                                    <form x-show="edit" x-transition action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mt-2 space-y-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="name" value="{{ $user->name }}" class="border p-2 w-full rounded">
                                        <input type="email" name="email" value="{{ $user->email }}" class="border p-2 w-full rounded">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Update</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>