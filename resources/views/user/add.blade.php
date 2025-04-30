<x-layout>
    <div class="space-y-6">
        <x-panel>
            <div class="flex justify-between px-2">
                <h3>About</h3>
                <a href="/about">Edit</a>
            </div>
           <x-form.divider/>
            <p>{{ $user->about }}</p>
        </x-panel>



        <x-panel>
            <div class="flex justify-between px-5 mb-2">
            <h3>Skill</h3>
            <div class="items-center">
                <a href="/skill" title="Add" class="text-2xl font-bold items-center mx-5 px-2">+</a> 
            </div>
        </div>
            <x-panel>
                @if ($skills->isEmpty())
   <h3>Click on the "Add" Button</h3>
                @endif
        @if ($skills->isNotEmpty())
        @foreach ($skills as $skill )
        <div class="flex flex-row py-3">
            <div>
                <h3>{{$skill->skill}}</h3>
            </div>
            <div class="space-x-2 ml-auto">
                <a href="/skill/edit/{{ $skill->id}}">Edit</a>
               <button  form="delete-skill" class="bg-red-500 px-2 rounded-sm border border-transparent">Delete</button> 
            </div>
        </div>
        <x-form.divider/>
        <form method="post" id="delete-skill" class="hidden" action="/delete-skill/{{ $skill->id }}">
        @csrf
        @method('DELETE')
        </form>
        @endforeach
        @endif
        </x-panel>
    </x-panel>


        <x-panel>
            <div class="flex justify-between px-5 mb-2">
            <h3>Experience</h3>
            <div class="items-center">
                <a href="/experience" title="Add" class="text-2xl font-bold items-center mx-5 px-2">+</a> 
            </div>
        </div>
            <x-panel>
                @if ($experiences->isEmpty())
   <h3>Click on the "Add" Button</h3>
                @endif
        @if ($experiences->isNotEmpty())
        @foreach ($experiences as $experience )
        <div class="flex flex-row py-3">
            <div>
                <h3 class="mt-4">{{$experience->Title}}</h3>
                <p>{{$experience->company}} . {{$experience->employment_type}}</p>
                <p>{{$experience->description}}</p>
            </div>
            <div class="space-x-2 ml-auto">
                <a href="/experience/edit/{{ $experience->id}}">Edit</a>
               <button form="delete-experience" class="bg-red-500 px-2 rounded-sm border border-transparent">Delete</button> 
            </div>
        </div>
        <x-form.divider/>
        <form method="post" id="delete-experience" class="hidden" action="/delete-experience/{{ $experience->id }}">
        @csrf
        @method('DELETE')
</form>
        @endforeach
        @endif
        </x-panel>
    </x-panel>



    <x-panel>
        <div class="flex justify-between px-5 mb-2">
            <h3>Education</h3>
            <div class="items-center">
                <a href="/school" title="Add" class="text-2xl font-bold items-center mx-5 px-2">+</a>               
            </div>
        </div>
            <x-panel>
            @if ($schools->isEmpty())
   <h3>Click on the "Add" Button</h3>
                @endif
        @if ($schools->isNotEmpty())
        @foreach ($schools as $school)
        <div class="flex flex-row py-3">
            <div>
                <h3>{{$school->name}}</h3>
                <p>{{$school->degree}}. {{$school->course}}</p>
                <span>{{$school->started}} - </span>
                <span>{{$school->ended}}</span>
            </div>
            <div  class="space-x-2 ml-auto">
            <a href="/school/edit/{{ $school->id }}">Edit</a>
            <button type="submit" form="delete-education" class="bg-red-500 px-2 rounded-sm border border-transparent">Delete</button>
            </div>
        </div>
        <form method="post" id="delete-education" class="hidden" action="/delete-education/{{ $school->id }}">
        @csrf
        @method('DELETE')
</form>
        <x-form.divider />
        @endforeach
        @endif
        </x-panel>
    </x-panel>



    <x-panel>
        <div class="flex justify-between px-5 mb-2">
            <h3>Licenses & Certifications</h3>
            <div class="items-center">
                <a href="/certifications" title="Add" class="text-2xl font-bold items-center mx-5 px-2">+</a>
            </div>
        </div>
            <x-panel>
            @if ($certifications->isEmpty())
   <h3>Click on the "Add" Button</h3>
                @endif
        @if ($certifications->isNotEmpty())
        @foreach ($certifications as $certification )
        <div class="flex flex-row py-3">
            <div>
                <h3>{{$certification->title}}</h3>
                <p>{{$certification->organisation}}</p>
                <p>Issued {{$certification->issuance}}</p>
            </div>
            <div class="space-x-2 ml-auto">
                <a  href="/certifications/edit/{{ $certification->id }}" >Edit</a>
                <button form="delete-certification" class="bg-red-500 px-2 rounded-sm border border-transparent">Delete</button> 
                </div>
            </div>
     
        <x-form.divider/>
        <form method="post" id="delete-certification" class="hidden" action="/delete-certification/{{ $certification->id }}">
        @csrf
        @method('DELETE')
</form>
        @endforeach
        @endif
        </x-panel>
    </x-panel>


</div>
</x-layout>