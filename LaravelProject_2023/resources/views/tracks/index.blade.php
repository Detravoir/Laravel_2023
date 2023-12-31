<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($tracks as $track)
            @if ($track->is_active === 1)
                <x-track-card :track="$track"/>
            @endif
        @endforeach
    </div>

    <div class="mt-6 p-4">
        {{$tracks->links()}}
    </div>
</x-layout>