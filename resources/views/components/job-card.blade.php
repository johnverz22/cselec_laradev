@props(['job'])

<x-card> 
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $job->logo ? asset('storage/'.$job->logo) : asset('/images/job.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/job/{{$job->id}}">{{ $job->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$job->company}}</div>
            
            <x-job-tags :tagsCSV="$job->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$job->location}}
            </div>
        </div>
    </div>
</x-card>