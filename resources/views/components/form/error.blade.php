@props(['error'])

@if ($error)
    <p class="text-red-500 text-xs font-semibold">{{ $error }}</p>
@endif
