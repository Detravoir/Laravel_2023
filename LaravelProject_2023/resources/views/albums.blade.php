<h1>{{$heading}}</h1>

@@foreach ($albums as $album)
    <h2>
        {{$album['title']}}
    </h2>
    <p>
        {{$album['description']}}
    </p>
@endforeach