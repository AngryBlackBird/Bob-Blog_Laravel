@extends("base")
@section("title","Modifier".$post->title)
@section("main")
    <div class="container mx-auto mt-5">
        @include("blog.form")
    </div>
@endsection
