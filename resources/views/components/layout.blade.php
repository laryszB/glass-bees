<!doctype html>
<html lang="en">
<head>

    {{--    Import Slim Select library--}}
    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet"/>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <title>Glass Bees</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
    <body {{$attributes->merge(['class' => 'mb-48'])}}>
    <nav class="flex justify-between items-center mb-4">
            <a href="/"
            ><img class="w-24" src="{{asset('images/bee_logo.png')}}" alt="" class="logo"
                /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">Witaj, {{auth()->user()->username}}</span>
                </li>
                <li>
                    <x-dropdown-menu>
                    </x-dropdown-menu>
                </li>
                <li>
                      <form class="inline" method="POST" action="/logout">
                          @csrf
                          <button type="submit" class="">
                              <i class="fa-solid fa-door-closed"></i>
                              Wyloguj się
                          </button>
                      </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Zarejestruj się</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Zaloguj się</a
                    >
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            {{--Content--}}
            {{$slot}}
        </main>

        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-2 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
        </footer>

        {{--
        wiadomość potwierdzajaca wykonanie jakiejś czynności, position fixed - zawsze na górze będzie
        (np. return redirect('/')->with('message', 'Pasieka została utworzona!');)
        --}}
        <x-flash-message>
        </x-flash-message>

    </body>
</html>
