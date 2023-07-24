@extends("base")

@section("main")

    <div>
        <div class="container mx-auto">
            <div class="py-16 lg:py-20">
                <div class="flex w-full mb-4">
                    <a href="{{route("blog.create")}}"
                       class="group ml-3 flex cursor-pointer items-center border-2 border-primary px-3 py-1 font-body font-medium text-primary transition-colors hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">
                        Créer un article
                    </a>
                </div>

                <div>
                    <img src="/assets/img/icon-blog.png" alt="icon envelope"/>
                </div>

                <h1 class="pt-5 font-body text-4xl font-semibold text-primary dark:text-white md:text-5xl lg:text-6xl">
                    Blog
                </h1>

                <div class="pt-3 sm:w-3/4">
                    <p class="font-body text-xl font-light text-primary dark:text-white">
                        Articles, tutorials, snippets, rants, and everything else. Subscribe for
                        updates as they happen.
                    </p>
                </div>

                <div class="pt-8 lg:pt-12">
                    @foreach($posts as $post)
                        <article class="border-b border-grey-lighter pb-8 mt-5">

                            @foreach($post->tags as $tag)
                                <span class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green">{{$tag->name}}</span>
                            @endforeach
                            <a
                                href="{{ route("blog.show", ['slug' => $post->slug, 'post'=>$post]) }}"
                                class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary"
                            >{{ $post->title }}</a
                            >
                            <div class="flex items-center pt-4">
                                    <p class="pr-2 font-body font-light text-primary dark:text-white">
                                        {{$post->created_at->monthName}}
                                    </p>

                                <span class="font-body text-grey dark:text-white">//</span>
                                <p class="pl-2 font-body font-light text-primary dark:text-white">
                                    4 min read
                                </p>
                            </div>
                        </article>
                    @endforeach

                    {{$posts->onEachSide(2)->links()}}

                </div>
            </div>
        </div>
    </div>

@endsection
