{{-- @php
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
@endforeach --}}

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
        <div
            x-data="{ show: true }"
            x-show="show"
            class="{{ $colors[$type] }} p-4 mb-3 rounded-sm shadow-sm border-l-4 flex justify-between items-center"
        >
            <span>{{ $msg }}</span>
            <button @click="show = false" class="ml-4 text-xl font-bold leading-none focus:outline-none">
                &times;
            </button>
        </div>
    @endif
@endforeach
