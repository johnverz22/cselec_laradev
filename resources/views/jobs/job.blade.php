<x-layout>
    
@if(isset($job))
<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$job->logo ? asset('storage/'.$job->logo) : asset('/images/job.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{ $job->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{$job->company}}</div>
                        <x-job-tags :tagsCSV="$job->tags" />
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$job->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{ $job->description }}
                                </p>

                                <a
                                    href="mailto:{{$job->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$job->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>


@endif

</x-layout>