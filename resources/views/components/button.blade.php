@props([
    'type' => 'button',
    'variant' => 'primary',
    'variants' => [
        'primary' => 'text-white bg-indigo-600 hover:bg-indigo-700',
        'secondary' => 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50'
    ]
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ' . $variants[$variant]]) }}>
    {{ $slot }}
</button>