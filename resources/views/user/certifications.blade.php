<x-layout>
    <x-form.form method="post" action="/certifications">
    <x-form.input name="title" label="Title"/>
    <x-form.input name="organisation" label="Organisation"/>
    <x-form.input name="issuance" label="Issuance Date" type="date"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>

    