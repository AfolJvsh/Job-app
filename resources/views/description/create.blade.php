<x-layout>
    <x-page-heading>
        Create Job Description for {{ $job->title }}
    </x-page-heading>

    <x-form.form method="POST" action="/description/create/{{$job->id}}">
    @csrf
    @method('PATCH')  

      <x-form.textarea label="Job Overview" name="job_overview" placeholder="Add Job Overview..." />
      <x-form.textarea label="Key responsibilities" name="responsibilities" placeholder="Add Responsibilities..." />
      <x-form.textarea label="Qualifications and Skills" name="qualifications" placeholder="Add Qualifications and Skills..." />
      <x-form.textarea label="Compensation and Benefits" name="compensations" placeholder="Add Compensation..."/>
      <x-form.textarea label="How To apply" name="how_to_apply" placeholder="Add How to Apply..."/>
   <x-form.button>Publish</x-form.button>
    </x-form.form>
</x-layout>