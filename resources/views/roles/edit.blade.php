<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Role Name</label>
                        <input type="text" name="name"
                               class="w-full border rounded-md p-2"
                               value="{{ old('name', $role->name) }}" required>
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

                        <div class="grid grid-cols-2 gap-2">
                            @foreach($permissions as $permission)
                                <label class="flex items-center space-x-2" id="permissionsList">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            class="permission-checkbox"
                                           {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                    <span>{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Update
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
