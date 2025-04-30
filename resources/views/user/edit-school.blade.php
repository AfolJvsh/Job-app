<x-layout>
<x-form.form method="post" action="/school/edit/{{ $schools->id }}">
    @csrf
    @method('PATCH')
<x-form.input name="name" label="School" value="{{ $schools->name }}"/>
    <x-form.input name="degree" label="Degree Type" value="{{ $schools->degree }}"/>
    <x-form.input name="course" label="Course of study" value="{{ $schools->course }}"/>
    <x-form.input name="started" label="Started" type="date" value="{{ $schools->started }}"/>
    <x-form.input name="ended" label="Ended" type="date" value="{{ $schools->ended }}"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>