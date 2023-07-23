<form action="" method="POST">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="post-tile">
                Titre
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="post-tile" type="text" name="title" placeholder="Définir un titre"
                value="{{@old('title', $post->title)}}">
            @error("title")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="post-slug">
                Slug
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="post-slug" type="text" name="slug" placeholder="Définir un slug (optionnel)"
                value="{{@old('slug', $post->slug)}}">
            @error("slug")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="blog-content">
                Contenue
            </label>
            <textarea
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="blog-content" name="content">{{@old('content', $post->content)}}</textarea>
            @error("content")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit"
            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        @if($post->id)
            Modifier
        @else
            Creer
        @endif
    </button>


</form>
