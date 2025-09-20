<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <p><strong>ID:</strong> {{ $permission->id }}</p>
                <p><strong>Name:</strong> {{ $permission->name }}</p>
                <p><strong>Created At:</strong> {{ $permission->created_at->format('d M, Y H:i') }}</p>

                <div class="mt-4">
                    <a href="{{ route('permissions.index') }}"
                       class="px-4 py-2 bg-gray-400 text-white rounded-md">
                        Back
                    </a>
                    <a href="{{ route('permissions.edit', $permission->id) }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-md">
                        Edit
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
