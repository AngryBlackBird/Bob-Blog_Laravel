@extends("base")

@section("main")

    <h1>Bonjour</h1>

    @foreach($posts as $post)
        <article class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                <p class="text-gray-700 text-base">
                    {{ $post->content }}
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       href="{{ route("blog.show", ['slug' => $post->slug, 'post'=>$post]) }}">Lire la suite</a>
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                       href="{{ route("blog.edit", ['slug' => $post->slug, 'post'=>$post]) }}">Modifier l'article</a>
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$post->slug}}</span>
            </div>
        </article>
    @endforeach

    {{$posts->links()}}
@endsection
