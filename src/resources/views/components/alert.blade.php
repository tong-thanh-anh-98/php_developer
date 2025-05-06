@php
    $messages = [
        'success' => session('success'),
        'error'   => session('error'),
        'warning' => session('warning'),
        'info'    => session('info'),
    ];

    $colors = [
        'success' => 'bg-green-200 border-green-600 text-green-800',
        'error'   => 'bg-red-200 border-red-600 text-red-800',
        'warning' => 'bg-yellow-200 border-yellow-600 text-yellow-800',
        'info'    => 'bg-blue-200 border-blue-600 text-blue-800',
    ];
@endphp

@foreach ($messages as $type => $msg)
    @if ($msg)
        <div class="{{ $colors[$type] }} p-4 mb-3 rounded-sm shadow-sm border-l-4">
            {{ $msg }}
        </div>
    @endif
@endforeach
