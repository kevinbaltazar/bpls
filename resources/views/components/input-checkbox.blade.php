@props([
    'class' => ' text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded',
    'type' => 'checkbox',
    'name' => ''
    
])

<div class="">
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        {{ $attributes->merge(['class' => 'h-4 w-4 mt-1 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded ' . $class]) }}
    >
</div>