<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Permission') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Permission Name</label>
                        <input type="text" name="name"
                               class="w-full border rounded-md p-2"
                               value="{{ old('name', $permission->name) }}" required>
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-md">
                        Update
                    </button>
                    <a href="{{ route('permissions.index') }}"
                       class="px-4 py-2 bg-gray-400 text-white rounded-md">
                        Cancel
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
