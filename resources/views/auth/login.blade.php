@extends("base")

@section("title","login")

@section("main")
    <div class="container mx-auto mt-5">

        <form action="" method="post">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="email" class="block pb-3 font-body font-medium text-primary dark:text-white">
                        Email
                    </label>
                    <input id="email" name="email" type="email" value="{{old("email")}}"
                           class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white">
                    @error("email")
                    <p class="text-red-600 text-xs italic">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="password" class="block pb-3 font-body font-medium text-primary dark:text-white">
                        Mot de passe
                    </label>
                    <input id="password" name="password" type="password"
                           class="w-full border border-primary bg-grey-lightest px-5 py-4 font-body font-light text-primary placeholder-primary transition-colors focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:text-white">
                    @error("password")
                    <p class="text-red-600 text-xs italic">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                    class="mt-5 mb-12 block bg-secondary px-10 py-4 text-center font-body text-xl font-semibold text-white transition-colors hover:bg-green sm:inline-block sm:text-left sm:text-2xl">
                Se connecter
            </button>
        </form>
    </div>
@endsection
