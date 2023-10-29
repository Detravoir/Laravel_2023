@props(['track'])

<x-card>
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/track/{{$track->id}}">{{$track->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$track->artist}}</div> 
            <x-track-genres :genresCsv="$track->genres"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> <a href="{{$track->link}}">{{$track->link}}></a>
            </div>
        </div>
    </div>
</x-card>