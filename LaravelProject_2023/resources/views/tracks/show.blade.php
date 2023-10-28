<x-layout>
<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<x-card class="p-10">
    <div class="flex flex-col items-center justify-center text-center">

        <h3 class="text-2xl mb-2">{{$track->title}}</h3>
        <div class="text-xl font-bold mb-4">{{$track->artist}}</div>
        <x-track-genres :genresCsv="$track->genres"/>
        <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> <a href="{{$track->link}}">{{$track->link}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Job Description
            </h3>
            <div class="text-lg space-y-6">
                {{$track->description}}

                
            </div>
        </div>
    </div>
</x-card>
</div>
</x-layout>