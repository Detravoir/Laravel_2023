<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Post a track</h2>
            <p class="mb-4">Post your favorite track!</p>
        </header>

        <form method="POST" action="/tracks">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Track Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"/>
            </div>

            <div class="mb-6">
                <label for="genres" class="inline-block text-lg mb-2">Genres (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="genres" placeholder="Example: dubstep, electronic, techno" />
            </div>

            <div class="mb-6">
                <label for="artist" class="inline-block text-lg mb-2">Artist</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="artist" />
            </div>

            <div class="mb-6">
                <label for="album" class="inline-block text-lg mb-2">Album (not required)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="album" />
            </div>       

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" ></textarea>
            </div>

            <div class="mb-6">
                <label for="link" class="inline-block text-lg mb-2">Link to the song</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="link" />
            </div>   

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Post Track</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>