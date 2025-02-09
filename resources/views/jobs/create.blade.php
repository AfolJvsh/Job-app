<x-layout>
    <x-page-heading>
        New Job
    </x-page-heading>

    <x-form.form method="POST" action="/jobs">
        <x-form.input label="Title" name="title" placeholder="CEO" />
        <x-form.input label="Salary" name="salary" placeholder="$90,000 USD" />
        <x-form.input label="Location" name="location" placeholder="Winter Park, Florida" />
<x-form.select label="Schedule" name="schedule">
    <option>Part Time</option>
    <option>Full Time</option>
</x-form.select>

<x-form.checkbox label="Feature (Costs Extra" name="featured"/>

        <!-- <x-form.input label="URL" name="url" placeholder=""/> -->
        <x-form.input label="Tags (comma separated)" name="tags" placeholder="video, education, sports"/>
        <x-form.button>Publish</x-form.button>
        <a href="" >Continue</a>
    </x-form.form>
</x-layout>