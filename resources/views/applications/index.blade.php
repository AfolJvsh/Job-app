<x-layout>
    <x-page-heading>
        Your Applications
    </x-page-heading>

    @foreach($applications as $application)
        <div class="mt-6 border border-gray-600 rounded-xl shadow-2xl px-4  ">
            <dl class="divide-y divide-gray-100">
                @foreach ($jobsPerApplication[$application->id] ?? [] as $job)
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 ">
                        <dt class="text-sm/6 font-medium">{{ $job->title }}</dt>
                        <dd class="mt-1 text-sm/6 text-gray-400  sm:col-span-2 sm:mt-0 ml-auto ">
                            {{ $statusesPerApplication[$application->id] ?? 'Pending' }}
                        </dd>
                        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-3 sm:mt-0 border-t border-gray-800 py-4 px-6">
                            <strong class="text-white">Cover Letter:</strong> 
                            {{ $coverLettersPerApplication[$application->id] ?? 'No Cover Letter' }}
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    @endforeach
</x-layout>
