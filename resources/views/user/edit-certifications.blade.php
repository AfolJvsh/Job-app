<x-layout>
    <x-form.form method="post" action="/certifications/edit/{{ $certifications->id }}">
        @csrf
        @method('PATCH')
    <x-form.input name="title" label="Title" value="{{ $certifications->title }}"/>
    <x-form.input name="organisation" label="Organisation" value="{{ $certifications->organisation }}" />
    <x-form.input name="issuance" label="Issuance Date" type="date" value="{{ $certifications->issuance }}"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>