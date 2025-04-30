<x-layout>
    <div class="space-y-6">

        <x-panel>
            <div class="flex flex-row justify-between">
                <div>
             <a href="/profile">
                <img title="Profile" src="https://ui-avatars.com/api/?name={{auth()->user ()-> name}}
                        " class= "w-20 h-20 rounded-xl"/>
                    </a>
                   
                </div>
        <a href="/add-profile" class="group hover:text-blue-500">Enhance your profile</a>
    </div>
    <x-panel class="mt-4">
    <h3>{{ $user->name }}</h3>
        <p>Contact info: {{ $user->email }} . {{ $user->phone_number }}</p>
        @if ($experiences->isNotEmpty() && $school->isNotEmpty())
        <p>{{$experiences[0]->title}} . {{ $school[0]->name }}</p>
        @endif
        <p>{{ $user->location }}</p>
    </x-panel>
</x-panel>
<x-panel>
   <h3>About</h3>
    <x-panel>{{ $user->about }}</x-panel>
</x-panel>
<x-panel>
    <h3>Skills</h3>
    <x-panel> 
        @if ($skills->isEmpty())
   <h3>You haven't added any education yet. Click on the "Enhance your profile" button to do so</h3>
                @endif
    @if ($skills->isNotEmpty())
        @foreach ($skills as $skill)
            <div class="py-3">
                <h3>{{$skill->skill}}</h3>
            </div>
            <x-form.divider/>
        @endforeach
        @endif</x-panel>
</x-panel>

<x-panel>
    <h3>Education</h3>
    <x-panel>
    @if ($schools->isEmpty())
   <h3>You haven't added any education yet. Click on the "Enhance your profile" button to do so</h3>
                @endif
    @if ($schools->isNotEmpty())
        @foreach ($schools as $school)
            <div class="py-3">
                <h3>{{$school->name}}</h3>
                <p>{{$school->degree}}. {{$school->course}}</p>
                <span>{{$school->started}} - </span>
                <span>{{$school->ended}}</span>
            </div>
            <x-form.divider/>
        @endforeach
        @endif
    </x-panel>
</x-panel>
<x-panel>
<h3>Licenses & Certifications</h3>
    <x-panel>
    @if ($certifications->isEmpty())
   <h3>You haven't added any certification yet. Click on the "Enhance your profile" button to do so</h3>
                @endif
    @if ($certifications->isNotEmpty())
        @foreach ($certifications as $certification )
        <div class="py-3">
    
                <h3>{{$certification->title}}</h3>
                <p>{{$certification->organisation}}</p>
                <p>Issued {{$certification->issuance}}</p>
            </div>
            <x-form.divider/>
            @endforeach
            @endif
    </x-panel>
</x-panel>

<x-panel>
<h3>Experiences</h3>    
<x-panel>
@if ($experiences->isEmpty())
   <h3>You haven't added any experiences yet. Click on the "Enhance your profile" button to do so</h3>
                @endif
@if ($experiences->isNotEmpty())
@foreach ($experiences as $experience )
<div class="py-3">
                <h3 class="mt-4">{{$experience->Title}}</h3>
                <p>{{$experience->company}} . {{$experience->employment_type}}</p>
                <p>{{$experience->description}}</p>
            </div>
            <x-form.divider/>
            @endforeach
        @endif
</x-panel>
</x-panel>
</div>
</x-layout>