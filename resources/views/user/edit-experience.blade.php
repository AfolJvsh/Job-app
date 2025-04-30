<x-layout>
<x-form.form method="post" action="/experience/edit/{{ $experiences->id }}">
@csrf
@method('PATCH')    
<x-form.input name="Title" label="Title" value="{{ $experiences->Title }}"/>
    <x-form.input name="employment_type" label="Employment Type" value="{{ $experiences->employment_type }}"/>
    <x-form.input name="company" label="Organisation" value="{{ $experiences->company }}"/>
    <x-form.textarea rows="5" name="description" label="Description">{{ $experiences->description }}</x-form.textarea>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>