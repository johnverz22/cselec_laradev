<x-layout>
    <x-card class="p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Job Post
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($jobs->isEmpty())

                @foreach($jobs as $job)
                    
                @endforeach
                    <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/job/{{$job->id}}">
                           {{$job->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/jobs/{{$job->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                       <form method="POST" action="/jobs/{{$job->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                <i
                                    class="fa-solid fa-trash-can"
                                ></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b">
                            <p class="text center">No Jobs Posting found..</p>
                        </td>
                    </tr>
                @endunless
                

                
            </tbody>
        </table>
    </x-card>
</x-layout>