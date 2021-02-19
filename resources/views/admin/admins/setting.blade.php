<x-admin-layout>
    <div class="max-w-3xl mx-auto px-24">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <ul class="text-red-600">{{$error}}</ul>
            @endforeach
        @endif
        <form method="POST" action="{{ Route('admin.setting')}}">
            @csrf

            <div>
                <x-input-label for="secretary" value="Secretary" />

                <select id="secretary" name="secretary" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Select a Secretary</option>

                    @foreach($approvers as $approver) 
                        <option value="{{ $approver->id }}" @if (old('secretary', $settings->secretary) === $approver->id) selected @endif>
                            {{ ucwords($approver->name) }}
                        </option>
                    @endforeach
                </select>
                
                @if ($error = $errors->first('secretary'))
                    <x-input-error for="secretary" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <x-input-label for="captain" value="Captain" />

                <select id="captain" name="captain" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Select a captain</option>

                    @foreach($approvers as $approver) 
                        <option value="{{ $approver->id }}" @if (old('captain', $settings->captain) === $approver->id) selected @endif>
                            {{ ucwords($approver->name) }}
                        </option>
                    @endforeach
                </select>

                @if ($error = $errors->first('captain'))
                    <x-input-error for="captain" value="{{ $error }}" />
                @endif
            </div>

            <div class="mt-6">
                <div class="flex justify-end">
                    <x-button class="ml-3" type="submit">Save</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>