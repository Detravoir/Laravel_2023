<h1>{{$heading}}</h1>

@foreach ($tracks as $track)
    <h2>
        <a href="/track/{{$track['id']}}">
        {{$track['title']}}</a>
    </h2>
    <p>
        {{$track['description']}}
    </p>
@endforeach