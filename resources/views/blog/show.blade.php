@extends("base")

@section("title",$post->title)
@section("main")
    <div>
        <div class="container mx-auto">
            <div class="pt-16 lg:pt-20">
                <div class="border-b border-grey-lighter pb-8 sm:pb-12">
                    @auth()
                        <div class="flex w-full mb-4">
                            <a href="{{route("blog.edit", ["slug"=>$post->slug, "post"=>$post])}}"
                               class="group ml-3 flex cursor-pointer items-center border-2 border-primary px-3 py-1 font-body font-medium text-primary transition-colors hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">
                                Modifier
                            </a>
                        </div>
                    @endauth
                    @foreach($post->tags as $tag)
                        <span
                            class="mb-5 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green sm:mb-8">
                          {{$tag->name}}
                      </span>
                    @endforeach

                    <h2 class="block font-body text-3xl font-semibold leading-tight text-primary dark:text-white sm:text-4xl md:text-5xl">
                        {{ $post->title }}                    </h2>
                    <div class="flex items-center pt-5 sm:pt-8">
                        <p class="pr-2 font-body font-light text-primary dark:text-white">
                            {{ $post->created_at->monthName }}
                        </p>
                        <span class="vdark:text-white font-body text-grey">//</span>
                        <p class="pl-2 pr-2 font-body font-light text-primary dark:text-white">
                            4 min read
                        </p>
                        <span class="vdark:text-white font-body text-grey">//</span>
                        <p class="pl-2 pr-2 font-body font-light text-primary dark:text-white">
                            {{$post->category->name ?? "Pas de catégorie"}}
                        </p>
                    </div>
                </div>
                @if($post->image)
                    <img src="{{$post->imageUrl()}}" alt="blogImg">
                @endif
                <div class="prose prose max-w-none border-b border-grey-lighter py-8 dark:prose-dark sm:py-12">
                    {{ $post->content }}
                </div>
            </div>
        </div>
@endsection
