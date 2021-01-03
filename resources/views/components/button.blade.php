@props([
    'type' => 'button',
    'variant' => 'primary',
    'variants' => [
        'primary' => 'text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500',
        'secondary' => 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-indigo-500',
        'success' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-500',
        'info' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
        'warning' => 'text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
        'error' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-500',
    ]
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 ' . $variants[$variant]]) }}>
    {{ $slot }}
</button>