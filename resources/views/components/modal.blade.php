@props([
    'title' => '',
    'submitLabel' => 'Submit',
    'cancelLabel' => 'Cancel',
    'withIcon' => 'true',
    'variant' => 'info',
    'colors' => [
        'info' => 'blue',
        'success' => 'green',
        'warning' => 'yellow',
        'error' => 'red',
    ]
])

<div x-data="{ on: false }">
    {{ $trigger }}

    <div x-show="on" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" 
        aria-hidden="true" class="fixed z-10 inset-0 overflow-y-auto"
    >
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            >
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                @click.away="on = false" 
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" 
                role="dialog" 
                aria-modal="true" 
                aria-labelledby="modal-headline"
            >
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button @click="on = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Close</span>

                        <x-heroicon-o-x class="h-6 w-6"></x-heroicon-o-x>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    @if ($withIcon === 'true')
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-{{ $colors[$variant] }}-100 sm:mx-0 sm:h-10 sm:w-10">
                            @if ($variant === 'success')
                                <x-heroicon-o-check-circle class="h-6 w-6 text-{{ $colors[$variant] }}-600"></x-heroicon-o-check-circle>
                            @elseif ($variant === 'error')
                                <x-heroicon-o-exclamation class="h-6 w-6 text-{{ $colors[$variant] }}-600"></x-heroicon-o-exclamation>
                            @endif
                        </div>
                    @endif

                    <div class="mt-3 w-full text-center sm:mt-0 @if ($withIcon === 'true') sm:ml-4 @endif sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            {{ $title }}
                        </h3>

                        <div class="mt-2">
                            {{ $slot }}
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    @if ($title !== "Message")
                        <x-button @click="{{ $onSubmit ?? '' }}" class="ml-3" variant="{{ $variant }}">
                            {{ $submitLabel }}
                        </x-button>
                        <x-button @click="on = false" variant="secondary">
                            {{ $cancelLabel }}
                        </x-button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>