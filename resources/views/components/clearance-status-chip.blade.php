@props([
    'status' => 'incomplete',
    'statuses' => [
        'incomplete' => 'info',
        'pending' => 'warning',
        'reviewed' => 'success',
        'inspected' => 'success',
        'approved' => 'success',
        'rejected' => 'error',
    ]
])

<x-chip variant="{{ $statuses[$status] }}">
    {{ ucwords($status) }}
</x-chip>