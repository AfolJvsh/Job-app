<x-layout>
    <x-page-heading>
        Registered Companies
    </x-page-heading>
    <div class="space-y-2 ">
        @foreach ( $companies as $company )
        <div class="w-full flex gap-x-6">
            <span class="rounded-xl bg-white/10 border border-white/10 p-4 m-3 w-full flex gap-x-6 items-center group hover:border-blue-800 transition-colors duration-300">
               <h3 class=" group-hover:text-blue-800 transition-colors duration-300">{{$company -> name}}</h3>
                <img src="https://ui-avatars.com/api/?name={{$company -> name}}
" class="ml-auto w-15 h-15"/>
            </span>
        </div>
        @endforeach
    </div>
    <div> {{$companies->links()}}</div>
</x-layout>