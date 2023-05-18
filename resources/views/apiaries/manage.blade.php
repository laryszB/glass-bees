<x-layout>
    @unless($apiaries->isEmpty())
    <x-card class="p-10">
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Zarządzaj pasiekami
            </h1>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach($apiaries as $apiary)
                    <tr class="border-gray-300">

                        <td class="px-2 py-2 border-t border-b border-gray-300 text-lg">
                            <img src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}" alt="Zdjęcie" class="w-20 h-20 ">
                        </td>

                        <td
                            class="px-2 py-2 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="/apiaries/{{$apiary->id}}">
                                <span class="text-xl font-semibold text-laravel hover:text-amber-400">{{$apiary->name}}</span>
                            </a>
                        </td>
                        <td
                            class="px-2 py-2 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="/apiaries/{{$apiary->id}}/edit"
                                class="text-blue-400 px-2 py-2 rounded-xl"
                            ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edytuj</a
                            >
                        </td>
                        <td
                            class="px-2 py-2 border-t border-b border-gray-300 text-lg"
                        >
{{--                        Argument action wymagany (podanie widoku obsługującego usunięcie rekordu)--}}
                            <x-delete-form action="/apiaries/{{$apiary->id}}">
                            </x-delete-form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
    @else
        <p class="flex justify-center text-xl bg-red-100 p-4">Nie masz żadnych pasiek</p>
    @endunless

</x-layout>
