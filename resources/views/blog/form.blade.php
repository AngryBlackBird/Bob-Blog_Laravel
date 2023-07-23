<form action="" method="POST">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
                class="block pb-3 font-body font-medium text-primary dark:text-white"
                   for="post-tile">
                Titre
            </label>
            <input
                class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white"
                id="post-tile" type="text" name="title" placeholder="Définir un titre"
                value="{{@old('title', $post->title)}}">
            @error("title")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label
                class="block pb-3 font-body font-medium text-primary dark:text-white"
                   for="post-slug">
                Slug
            </label>
            <input
                class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white"
                id="post-slug" type="text" name="slug" placeholder="Définir un slug (optionnel)"
                value="{{@old('slug', $post->slug)}}">
            @error("slug")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label
                class="block pb-3 font-body font-medium text-primary dark:text-white"
                   for="blog-content">
                Contenue
            </label>
            <textarea
                class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white"
                id="blog-content" name="content">{{@old('content', $post->content)}}</textarea>
            @error("content")
            <p class="text-red-600 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit"
            class="mt-5 mb-12 block bg-secondary px-10 py-4 text-center font-body text-xl font-semibold text-white transition-colors hover:bg-green sm:inline-block sm:text-left sm:text-2xl"
    >
        @if($post->id)
            Modifier
        @else
            Creer
        @endif
    </button>


</form>
