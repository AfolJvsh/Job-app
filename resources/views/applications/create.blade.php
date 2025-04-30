<x-layout>
<x-page-heading>
        Apply for {{$job->title}}
    </x-page-heading>

    <x-form.form method="POST" action="/apply/{{$job->id}}">
        <x-form.input label="Cover Letter:" name="cover_letter" />
        <x-form.button>Submit Application</x-form.button>
    </x-form.form>
</x-layout>