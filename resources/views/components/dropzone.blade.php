@props([
    'label' => '', 
    'name' => '', 
    'class' => '',
    'err' => '',
])

<div {{ $attributes->merge(['class' => $class]) }} x-data="Dropzone()">
    <label for="cover_photo" class="block text-sm font-medium text-gray-700 mt-4">
        {{ $label }}
    </label>

    <div class="mt-2 h-56 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md {{$err ? 'border-red-600' : 'border-gray-300'}}">
        <div x-show="image === null" class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <div class="flex text-sm text-gray-600">
                <label for="{{ $name }}" class="mx-auto relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a photo</span>
                    <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only" @change="preview">
                </label>
            </div>

            <p class="text-xs text-gray-500">
                PNG, JPG, GIF up to 5MB
            </p>
        </div>

        <div class="relative" x-show="image">
            <img :src="image" class="h-48 w-auto" alt="" />

            <button type="button" @click="remove()" class="absolute top-0 right-0 mr-3 mt-3 rounded-full bg-gray-200">
                <x-heroicon-o-x class="h-6 w-6 text-gray-500"></x-heroicon-o-x>
            </button>
        </div>
    </div>
    @if ($err)
        <span class="text-red-600 flex items-center mt-2 text-sm">
            <svg class="w-4 h-4 mr-1 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                 {{$err}}
            </div>
        </span>
    @endif
</div>


<script>
    function Dropzone() {
        return {
            image: null,

            preview() {
                let reader = new FileReader();
                let file = event.target.files[0] || null;

                reader.addEventListener('load', () => {
                    this.image = reader.result;
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            },

            remove() {
                this.image = null;
            }
        }
    }
</script>
