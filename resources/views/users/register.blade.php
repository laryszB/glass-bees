<x-layout>
    <x-card
        class=" p-10 max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Zarejestruj się
            </h2>
            <p class="mb-4">Zarejestruj się aby rozpocząć zarządzanie pasiekami</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="username" class="inline-block text-lg mb-2">
                    Nazwa użytkownika
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="username"
                    value="{{old('username')}}"
                />

                @error('username')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{old('email')}}"
                />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Hasło
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="password2"
                    class="inline-block text-lg mb-2"
                >
                    Potwierdź hasło
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                />

                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Zarejestruj się
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Masz już konto?
                    <a href="/login">
                        <span class="text-laravel">Zaloguj się</span>
                    </a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
