<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit track</h2>
            <p class="mb-4">Edit {{$track->title}}</p>
        </header>

        <form method="POST" action="/tracks/{{$track->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Track Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$track->title}}"/>
            </div>

            <div class="mb-6">
                <label for="genres" class="inline-block text-lg mb-2">Genres (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="genres" placeholder="Example: dubstep, electronic, techno" value="{{$track->genres}}"/>
            </div>

            <div class="mb-6">
                <label for="artist" class="inline-block text-lg mb-2">Artist</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="artist" value="{{$track->artist}}"/>
            </div>

            <div class="mb-6">
                <label for="album" class="inline-block text-lg mb-2">Album (not required)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="album" value="{{$track->album}}"/>
            </div>       

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" value="{{$track->description}}"></textarea>
            </div>

            <div class="mb-6">
                <label for="link" class="inline-block text-lg mb-2">Link to the song</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="link" value="{{$track->link}}"/>
            </div>   

            <div class="mb-6">
                <label for="is_active" class="inline-block text-lg mb-2">Set activaty </label>
                <select name="is_active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>  

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Update Track</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>