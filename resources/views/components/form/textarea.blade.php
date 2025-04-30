@props(['label', 'name'])

@php
$defaults = [
'row' =>6,
'type'=> 'text',
'id'=> $name,
'name'=> $name,
'class'=> 'w-full h-full overflow-hidden resize-none rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
'value'=>old($name)
];
@endphp

<x-form.field :$label :$name>
    <textarea {{$attributes($defaults) }}>{{ $slot }}</textarea>
</x-form.field>