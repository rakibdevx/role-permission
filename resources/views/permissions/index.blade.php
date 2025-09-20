<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('permissions.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md
                      font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-blue-700 active:bg-blue-900 focus:outline-none
                      focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition">
                + Create Permission
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <table class="w-full mt-4 border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-left">#</th>
                            <th class="border px-4 py-2 text-left">Name</th>
                            <th class="border px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $permission->name }}</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ route('permissions.show', $permission->id) }}"
                                       class="px-2 py-1 bg-indigo-500 text-white text-sm rounded hover:bg-indigo-600">
                                        View
                                    </a>
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                       class="px-2 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-2 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border px-4 py-2 text-center text-gray-500">
                                    No permissions found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
