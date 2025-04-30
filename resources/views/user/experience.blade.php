<x-layout>
    <x-form.form method="post" action="/experience">
    <x-form.input name="Title" label="Title"/>
    <x-form.input name="employment_type" label="Employment Type"/>
    <x-form.input name="company" label="Organisation"/>
    <x-form.textarea rows="5" name="description" label="Description"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>
