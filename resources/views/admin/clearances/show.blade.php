<x-admin-layout>
    <div class="mx-20">
        <div class="flex items-center justify-between">
            <div>
                @if ($clearance->status === 'reviewed')
                    <p class="ml-2 text-gray-600">
                        Assigned inspector: 
                        <span class="text-gray-900 font-bold">
                            {{ optional($clearance->inspector)->name ?? 'None' }}
                        </span>
                    </p>
                @endif
            </div>

            <div class="flex">
                @if ($clearance->status === 'approved')
                    <x-modal 
                        variant="info" 
                        title="Print Clearance" 
                        submit-label="Print" 
                        on-submit="document.getElementById('print-form').submit()"
                        with-icon="false"
                    >
                        <form id="print-form" class="space-y-6" method="POST" action="{{ route('admin.clearances.print', $clearance) }}">
                            @csrf

                            <div>
                                <x-input-label for="order_number" value="OR #" />

                                <x-input 
                                    class="mt-1" 
                                    name="order_number" 
                                    value="{{ old('order_number') }}"
                                />
                                
                                @if ($error = $errors->first('order_number'))
                                    <x-input-error for="order_number" value="{{ $error }}" />
                                @endif
                            </div>

                            <div>
                                <x-input-label for="amount" value="Amount" />

                                <x-input 
                                    class="mt-1" 
                                    name="amount" 
                                    value="{{ old('amount') }}"
                                />
                                
                                @if ($error = $errors->first('amount'))
                                    <x-input-error for="amount" value="{{ $error }}" />
                                @endif
                            </div>

                            <div>
                                <x-input-label for="sticker_number" value="Sticker / Plate #" />

                                <x-input 
                                    class="mt-1" 
                                    name="sticker_number" 
                                    value="{{ old('sticker_number') }}"
                                />
                                
                                @if ($error = $errors->first('sticker_number'))
                                    <x-input-error for="sticker_number" value="{{ $error }}" />
                                @endif
                            </div>
                        </form>

                        <x-slot name="trigger">
                        <x-button @click="on = true" variant="info" >
                                Print
                            </x-button>
                        </x-slot>
                    </x-modal>
                @else
                    <x-modal 
                        variant="error" 
                        title="Reject Clearance" 
                        submit-label="Reject" 
                        on-submit="document.getElementById('reject-form').submit()"
                    >
                        <x-slot name="trigger">
                            <x-button @click="on = true" variant="error">
                                Reject
                            </x-button>
                        </x-slot>

                        <form id="reject-form" method="POST" action="{{ route('admin.clearances.update', $clearance) }}">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="new_status" value="rejected" />
                        </form>

                        <p class="text-sm text-gray-500">
                            Are you sure you want to reject this clearance application?
                        </p>
                    </x-modal>

                    <x-modal 
                        variant="success" 
                        with-icon="false"
                        title="Approve Clearance" 
                        submit-label="Approve"
                        on-submit="document.getElementById('approve-form').submit()"
                    >
                        <x-slot name="trigger">
                            <x-button @click="on = true" class="ml-3" variant="success">
                                Approve
                            </x-button>
                        </x-slot>

                        <form id="approve-form" method="POST" action="{{ route('admin.clearances.update', $clearance) }}">
                            @csrf
                            @method('PATCH')
                            
                            <input type="hidden" name="new_status" value="approved" />

                            <p class="text-sm text-gray-500">
                                You are approving this business clearance
                                
                                @if ($clearance->status === 'pending')
                                    and you have to select the designated inspector below
                                @endif
                            </p>
                            
                            @if ($clearance->status === 'reviewed')
                                <div class="mt-4">
                                    <textarea name="inspector_comment" id="" cols="30" rows="10"></textarea>
                                </div>
                            @endif

                            @if ($clearance->status === 'pending')
                                <div class="mt-4">
                                    <select id="inspector" name="inspector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option disabled selected>Select the inspector</option>

                                        @foreach($inspectors as $inspector) 
                                            <option value="{{ $inspector->id }}">
                                                {{ ucwords($inspector->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </form>
                    </x-modal>
                @endif
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-5">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Owner Information
                </h3>

                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal Information of the business owner
                </p>
            </div>

            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Name
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->fullname }}
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->personal_address }}
                        </dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Birth date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Carbon\Carbon::parse($clearance->birthdate)->toFormattedDateString() }}
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Birth place
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->birthplace }}
                        </dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->mobile_number }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-8">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Business Information
                </h3>

                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Details of the business that is subject for approval
                </p>
            </div>

            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Name
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->business_name }}
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->business_address }}
                        </dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Telephone number
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clearance->telephone_number ?? '---' }}
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Type
                        </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$clearance->business_type}}
                        </dd>
                    </div>   
                </dl>
            </div>
        </div>

         @foreach ($clearance->getMedia('requirements') as $requirements)
            <img src="{{$requirements->getUrl()}}" alt="" width="200px">
         @endforeach

    </div>
</x-admin-layout>