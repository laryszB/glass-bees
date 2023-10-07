<x-layout>
    @unless($apiaries->isEmpty())
        <div class="text-center mt-4">
            <h1 class="mb-6 text-4xl font-bold uppercase">Zarządzaj pasiekami</h1>
        </div>

        <div class="overflow-x-auto shadow-md sm:rounded-lg mx-96 mb-6">

            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-lg text-white uppercase bg-amber-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nazwa pasieki
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
                </thead>
                @foreach ($apiaries as $apiary)
                    <tbody>

                    <tr class="bg-amber-50 border-b hover:bg-amber-100">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            <img
                                src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
                                alt="Zdjęcie" class="w-20 h-20 ">
                        </th>
                        <td class="px-6 py-4">
                            <a href="/apiaries/{{$apiary->id}}">
                                <span
                                    class="text-xl font-semibold text-laravel hover:text-amber-400">{{$apiary->name}}</span>
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{route('apiaries_edit', ['apiary'=>$apiary])}}"
                               class="text-blue-400 px-2 py-2 rounded-xl">
                                <i class="fa-solid fa-pen-to-square"></i> Edytuj
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-delete-form class="text-red-500"
                                           action="{{route('apiaries_destroy', ['apiary'=>$apiary])}}">
                            </x-delete-form>
                        </td>
                    </tr>
                    </tbody>

                @endforeach
            </table>
        </div>
    @else
        <p class="flex justify-center text-xl bg-red-100 p-4">Nie masz żadnych pasiek</p>
    @endunless

</x-layout>


