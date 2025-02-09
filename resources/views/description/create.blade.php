<x-layout>
    <x-page-heading>
        Create Job Description for 
    </x-page-heading>

    <x-form.form method="POST" action="/description/create/{{$job->id}}">
    @csrf
    @method('PATCH')  

      <x-form.input label="Job Overview" name="job_overview" placeholder="Add Job Overview..." />
      <x-form.input label="Key responsibilities" name="responsibilities" placeholder="Add Responsibilities..." />
      <x-form.input label="Qualifications and Skills" name="qualifications" placeholder="Add Qualifications and Skills..." />
      <x-form.input label="Compensation and Benefits" name="how_to_apply" placeholder="Add Compensation..."/>
      <x-form.input label="How To apply" name="application" placeholder="Add How to Apply..."/>
   <x-form.button>Publish</x-form.button>
    </x-form.form>
</x-layout>