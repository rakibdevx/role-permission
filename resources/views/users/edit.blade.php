<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User & Assign Roles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Assign Roles</label>
                        <div class="grid grid-cols-2 gap-2">
                           @foreach($roles as $role)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                        {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                    <span>{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Update
                    </button>
                    <a href="{{ route('users.index') }}"
                       class="px-4 py-2 bg-gray-400 text-white rounded-md">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
