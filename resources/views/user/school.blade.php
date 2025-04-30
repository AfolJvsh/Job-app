<x-layout>
    <x-form.form method="post" action="/school">
    <x-form.input name="name" label="School"/>
    <x-form.input name="degree" label="Degree Type"/>
    <x-form.input name="course" label="Course of study"/>
    <x-form.input name="started" label="Started" type="date"/>
    <x-form.input name="ended" label="Ended" type="date"/>
    <a href="/add-profile">Cancel</a>
    <x-form.button>Save</x-form.button>
    </x-form.form>
</x-layout>
