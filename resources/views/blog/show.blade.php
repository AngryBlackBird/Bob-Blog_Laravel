@extends("base")

@section("title",$post->title)
@section("main")
    <div class="w-full rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
            <p class="text-gray-700 text-base">
                {{ $post->content }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
        <span
            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$post->slug}}</span>
        </div>
    </div>
@endsection
