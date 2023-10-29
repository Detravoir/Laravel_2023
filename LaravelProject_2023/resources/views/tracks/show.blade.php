<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">

                <h3 class="text-2xl mb-2">{{$track->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$track->artist}}</div>
                <div class="text-xl font-bold mb-4">{{$track->album}}</div>
                <x-track-genres :genresCsv="$track->genres"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> <a href="{{$track->link}}">{{$track->link}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$track->description}}
                    </div>
                </div>
            </div>
        </x-card>

    {{-- <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/tracks/{{$track->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form method="POST" action="/tracks/{{$track->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
        </form>
    </x-card> --}}
    </div>
</x-layout>