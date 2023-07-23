<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link crossorigin="crossorigin" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="preload"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/atom-one-dark.min.css"/>

    <link
        crossorigin="anonymous"
        href="/assets/styles/main.min.css"
        media="screen"
        rel="stylesheet"
    />
    <!--Alpine Js V3-->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>

    {{--    @vite('resources/css/app.css')--}}
    <title>@yield("title")</title>
</head>
<body
    x-data="global()"
    x-init="themeInit()"
    :class="isMobileMenuOpen ? 'max-h-screen overflow-hidden relative' : ''"
    class="dark:bg-primary"
>
<header>
    <div class="container mx-auto">
        <div class="flex items-center justify-between py-6 lg:py-10">
            <a href="/" class="flex items-center">
      <span href="/" class="mr-2">
        <img src="/assets/img/logo.svg" alt="logo"/>
      </span>
                <p class="hidden font-body text-2xl font-bold text-primary dark:text-white lg:block">
                    Bob
                </p>
            </a>
            <div class="flex items-center lg:hidden">
                <i
                    class="bx mr-8 cursor-pointer text-3xl text-primary dark:text-white"
                    @click="themeSwitch()"
                    :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"
                ></i>

                <svg
                    width="24"
                    height="15"
                    xmlns="http://www.w3.org/2000/svg"
                    @click="isMobileMenuOpen = true"
                    class="fill-current text-primary dark:text-white"
                >
                    <g fill-rule="evenodd">
                        <rect width="24" height="3" rx="1.5"/>
                        <rect x="8" y="6" width="16" height="3" rx="1.5"/>
                        <rect x="4" y="12" width="20" height="3" rx="1.5"/>
                    </g>
                </svg>
            </div>
            <div class="hidden lg:block">
                <ul class="flex items-center">

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a href="{{route("home")}}"
                           class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary">
                            Intro
                        </a>
                    </li>

                    <li class="group relative mr-6 mb-1">
                        <div
                            class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                        ></div>
                        <a href="{{route("blog.index")}}"
                           class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary">
                            Blog
                        </a>
                    </li>

                    <li>
                        <i
                            class="bx cursor-pointer text-3xl text-primary dark:text-white"
                            @click="themeSwitch()"
                            :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"
                        ></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div
        class="pointer-events-none fixed inset-0 z-50 flex bg-black bg-opacity-80 opacity-0 transition-opacity lg:hidden"
        :class="isMobileMenuOpen ? 'opacity-100 pointer-events-auto' : ''"
    >
        <div class="ml-auto w-2/3 bg-green p-4 md:w-1/3">
            <i class="bx bx-x absolute top-0 right-0 mt-4 mr-4 text-4xl text-white"
               @click="isMobileMenuOpen = false"></i>
            <ul class="mt-8 flex flex-col">

                <li class="">
                    <a href="{{ route("home") }}"
                       class="mb-3 block px-2 font-body text-lg font-medium text-white">Intro</a>
                </li>
                <li class="">
                    <a href="{{route("blog.index")}}" class="mb-3 block px-2 font-body text-lg font-medium text-white">Blog</a>
                </li>

            </ul>
        </div>
    </div>
</header>

<main id="main">
    @include('common.alert')
    @yield("main")
</main>

<footer class="container mx-auto">
    <div class="flex flex-col items-center justify-between border-t border-grey-lighter py-10 sm:flex-row sm:py-12">
        <div class="mr-auto flex flex-col items-center sm:flex-row">
            <a href="/" class="mr-auto sm:mr-6">
                <img src="/assets/img/logo.svg" alt="logo"/>
            </a>
            <p class="pt-5 font-body font-light text-primary dark:text-white sm:pt-0">
                ©2020 Bob Blog.
            </p>
        </div>
        <div class="mr-auto flex items-center pt-5 sm:mr-0 sm:pt-0">
            <a href="https://github.com/ " target="_blank">
                <i class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-github"></i>
            </a>
            <a href="https://codepen.io/ " target="_blank">
                <i class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-codepen"></i>
            </a>
            <a href="https://www.linkedin.com/ " target="_blank">
                <i class="text-4xl text-primary dark:text-white pl-5 hover:text-secondary dark:hover:text-secondary transition-colors bx bxl-linkedin"></i>
            </a>

        </div>
    </div>
</footer>

{{--@vite('resources/js/app.js')--}}

<script src="/assets/js/main.js"></script>

</body>
</html>
