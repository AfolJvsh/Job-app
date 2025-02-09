<x-layout>
   <x-page-heading>
    {{$job->title}} Job Description:
   </x-page-heading>
<div class="space-y-1">

   <x-panel> 
      <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">{{$job->title}} Overview</h3>
      <div>
         <span>{{$job->job_overview}} </span>
   </div>
</x-panel>

<x-panel> 
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">Responsibilities</h3>
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
   <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">How to Apply</h3>
   <div>
      <span>{{$job->how_to_apply}} </span>
   </div>
</x-panel>
</div>
<a href="/" class="text-blue-800 px-4 py-2 flex justify-end">Back to Job Panel</a>
</x-layout>