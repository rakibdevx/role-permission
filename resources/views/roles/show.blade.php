<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p><strong>ID:</strong> {{ $role->id }}</p>
                <p><strong>Name:</strong> {{ $role->name }}</p>
                <p><strong>Permissions:</strong></p>
                <div class="mt-3 flex flex-wrap gap-2">
                    @forelse($role->permissions as $permission)
                        <span class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full shadow-sm hover:bg-blue-200 transition duration-200">
                            {{ $permission->name }}
                        </span>
                    @empty
                        <span class="text-gray-400 text-sm italic">No permissions assigned</span>
                    @endforelse
                </div>


                <div class="mt-4">
                    <a href="{{ route('roles.index') }}"
                       class="px-4 py-2 bg-gray-400 text-white rounded-md">
                        Back
                    </a>
                    <a href="{{ route('roles.edit', $role->id) }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-md">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
