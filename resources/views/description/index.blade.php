<x-layout>
   <x-page-heading>
    {{$job->title}} Job Description:
   </x-page-heading>
<div class="space-y-1">
   <div class="flex justify-end space-x-2 text-blue-800">

      <span>{{ $job->schedule }} at </span>
      <span>{{ $job->location }}</span>
      <span>{{ $job->salary }} / month</span>
   </div>
      <x-panel> 
      <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">{{$job->title}} Overview</h3>
      <div>
         <span>{{$job->job_overview}} </span>
   </div>
</x-panel>

<x-panel> 
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">Key Responsibilities</h3>
   <div>
      <span>{{$job->responsibilities}} </span>
   </div>
</x-panel>

  <x-panel> 
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">Qualifications and SKills Required</h3>
   <div>
      <span>{{$job->qualifications}} </span>
   </div>
</x-panel>
  <x-panel> 
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">Compensations and Benefits</h3>
   <div>
      <span>{{$job->compensations}} </span>
   </div>
</x-panel>

  <x-panel> 
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">How to Apply</h3>
   <div>
      <span>{{$job->how_to_apply}} </span>
   </div>
</x-panel>

@auth
@if(auth()->user()->role === 'applicant')
<x-page-heading>OR</x-page-heading>
<div class="m-auto py-4 flex justify-center gap-x-6 items-center">
      <span class="items-center my-auto">Apply by clicking on the Apply button:</span>
      <a href="/apply/{{$job->id}}" class="px-4 py-1 font-bold bg-green-400 rounded-sm hover:bg-white border border-green-400 hover:text-green-400 transition-colors duration-300">Apply</a>  
       </div>  
            @endif
            @if(auth()->user()->role === 'employer' && auth()->user()->id === $job->user_id)
            <div class="m-auto py-4 flex justify-end gap-x-6 items-center"></div>
            <span class="items-center my-auto">
            Edit Job Description
            </span>
           <a href="/description/create/{{$job->id}}" class="px-4 py-1 font-bold bg-green-400 rounded-sm hover:bg-white border border-green-400 hover:text-green-400 transition-colors duration-300">Edit</a>
           </div> 
            @endif
        @endauth

   
</div>

<a href="/" class="text-blue-800 px-4 py-2  flex justify-end">Back to Job Panel</a>
</x-layout>