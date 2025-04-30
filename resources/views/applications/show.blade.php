<x-layout>
    @foreach($applications as $application)
        <div class="mt-6 border-y border-gray-100 shadow-xl bg-white/5 p-4 rounded-xl">
            <dl class="divide-y divide-gray-100">
                @php
                    // Convert job_id into an array (even if stored as a string)
                    $jobIds = is_array($application->job_id) ? $application->job_id : [$application->job_id];
                    $coverLetters = is_array($application->cover_letter) ? $application->cover_letter : [$application->cover_letter];
                @endphp

                @if(count($jobIds) > 0)
                    @foreach($jobIds as $index => $jobId)
                        @php
                            // Find the corresponding job
                            $job = $jobs->firstWhere('id', $jobId);
                        @endphp

                        @if($job)
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium text-blue-900">{{ $job->title }}</dt>
                                <dd class="mt-1 text-sm text-gray-400 sm:col-span-2">
                                    <strong>Applicant:</strong> {{ $application->user->name }}
                                </dd>
                                <dd class="mt-1 text-sm text-gray-700 sm:col-span-3">
                                    <strong>Cover Letter:</strong> {{ $coverLetters[$index] ?? 'No cover letter provided' }}
                                </dd>
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Job not found (ID: {{ $jobId }})</p>
                        @endif
                    @endforeach
                @else
                    <p class="text-sm text-gray-500">No job information available.</p>
                @endif
            </dl>
            <a href="/applicants/{{ $application->id }}" class="hover:text-blue-800">Check full details</a>
        </div>
    @endforeach
</x-layout>
