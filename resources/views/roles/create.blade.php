<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700">Role Name</label>
                        <input type="text" name="name"
                               class="w-full border rounded-md p-2"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Assign Permissions</label>
                        <button type="button" id="checkAllBtn"
                                class="mb-2 px-4 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Check All
                        </button>
                        <div class="grid grid-cols-2 gap-2" id="permissionsList">
                            @foreach($permissions as $perm)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"
                                        class="permission-checkbox"
                                        {{ isset($rolePermissions) && in_array($perm->name, $rolePermissions) ? 'checked' : '' }}>
                                    <span>{{ $perm->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Save
                    </button>
                    <a href="{{ route('roles.index') }}"
                       class="px-4 py-2 bg-gray-400 text-white rounded-md">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const checkAllBtn = document.getElementById('checkAllBtn');
    const checkboxes = document.querySelectorAll('.permission-checkbox');

    let allChecked = false;

    checkAllBtn.addEventListener('click', () => {
        allChecked = !allChecked;
        checkboxes.forEach(cb => cb.checked = allChecked);
        checkAllBtn.textContent = allChecked ? 'Uncheck All' : 'Check All';
    });
</script>
