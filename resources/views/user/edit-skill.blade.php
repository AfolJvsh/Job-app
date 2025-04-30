<x-layout>
<x-form.form method="post" action="/skill/edit/{{ $skills->id }}">
    @csrf
    @method('PATCH')
<x-form.input name="skill" label="Skill" value="{{ $skills->skill }}"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>