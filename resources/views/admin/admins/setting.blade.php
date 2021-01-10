<x-admin-layout>
    <div class="max-w-3xl mx-auto px-24">
        <form method="POST" action="#">
            @csrf

            <div>
                <x-input-label for="secretary" value="Secretary" />

                <select id="secretary" name="secretary" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Select a role</option>

                    @foreach($roles as $role) 
                        <option value="{{ $role->id }}" @if (old('role') === $role->id) selected @endif>
                            {{ ucwords($role->name) }}
                        </option>
                    @endforeach
                </select>
                
                @if ($error = $errors->first('name'))
                    <x-input-error for="name" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <x-input-label for="captain" value="Captain" />

                <select id="captain" name="captain" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Select a role</option>

                    @foreach($roles as $role) 
                        <option value="{{ $role->id }}" @if (old('role') === $role->id) selected @endif>
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