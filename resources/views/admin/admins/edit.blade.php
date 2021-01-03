<x-admin-layout>
    <div class="max-w-3xl mx-auto px-24">
        <form method="POST" action="{{ route('admin.admins.update', $admin) }}">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="name" value="Name" />

                <x-input 
                    class="mt-1" 
                    name="name" 
                    value="{{ old('name', $admin->name) }}"
                />

                @if ($error = $errors->first('name'))
                    <x-input-error for="name" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <x-input-label for="email" value="Email" />

                <x-input class="mt-1" name="email" value="{{ old('email', $admin->email) }}" />

                @if ($error = $errors->first('email'))
                    <x-input-error for="email" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <x-input-label for="role" value="Role" />

                <select id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Select a role</option>
                    
                    @foreach($roles as $role) 
                        <option 
                            value="{{ $role->id }}" 
                            @if (optional($admin->role)->id === $role->id) selected @endif
                        >
                            {{ ucwords($role->name) }}
                        </option>
                    @endforeach
                </select>

                @if ($error = $errors->first('role'))
                    <x-input-error for="role" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <div class="flex justify-end">
                    <x-button variant="secondary">Cancel</x-button>
                    <x-button class="ml-3" type="submit">Save</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>