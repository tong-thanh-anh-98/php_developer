@if ($errors->has($field))
    <p class="text-red-400 font-medium">{{ $errors->first($field) }}</p>
@endif
