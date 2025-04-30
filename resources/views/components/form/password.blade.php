@props(['label', 'name'])

@php
    $inputId = $name . '_' . uniqid(); // Generate a unique key
@endphp

<div class="input-group" style="position: relative;">
    <x-form.input label="{{ $label }}" name="{{ $name }}" id="{{ $inputId }}" type="password"/>
    <button style="position: absolute; right:10px; z-index:3; bottom:15px;" 
        class="btn text-grey btn-outline-secondary" 
        type="button" 
        data-target="{{ $inputId }}">
        Show
    </button>
</div>


