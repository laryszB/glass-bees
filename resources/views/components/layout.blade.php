<!doctype html>
<html lang="en">
<head>

    <link rel="icon" href="images/bee_icon.png">

    {{--    LEAFLET JAVASCRIPT FOR MAPS--}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@latest/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@latest/dist/leaflet.js"></script>

    {{--    CHART JS--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    {{--    Import Slim Select library--}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

    <div class="absolute top-0 left-0 z-10 ">
        <a href="/"><img class="lg:w-24 w-16" src="{{asset('images/bee_logo.png')}}" alt="" class="logo" /></a>
    </div>

    {{--    Menu boczne dla mniejszych ekranów--}}
    <x-side-menu>
    </x-side-menu>


    <nav class="hidden lg:flex justify-between items-center mb-4">
            <a href="/"
            ><img class="w-24" src="{{asset('images/bee_logo.png')}}" alt="" class="logo"
                /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">Witaj, {{auth()->user()->username}}</span>
                </li>
                <li>
                    <x-dropdown-menu-apiary>
                    </x-dropdown-menu-apiary>
                </li>
                <li>
                    <x-dropdown-menu-bees>
                    </x-dropdown-menu-bees>
                </li>
                    <li>
                        <x-dropdown-menu-harvests>
                        </x-dropdown-menu-harvests>
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

        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-2 opacity-90 justify-center">
            <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
        </footer>

        {{--
        wiadomość potwierdzajaca wykonanie jakiejś czynności, position fixed - zawsze na górze będzie
        (np. return redirect('/')->with('message', 'Pasieka została utworzona!');)
        --}}
        <x-flash-message>
        </x-flash-message>

        <x-flash-message-error>
        </x-flash-message-error>

    </body>
</html>
