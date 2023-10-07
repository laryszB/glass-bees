<x-layout>
    <div class="text-center mt-4">
        <h1 class="text-4xl font-bold uppercase">Zarządzaj ulami</h1>
    </div>
    @unless($apiaries->isEmpty())
    @foreach ($apiaries as $apiary)
        <div class="overflow-x-auto shadow-md sm:rounded-lg mx-60 mb-6">
            <div class="flex justify-center text-lg text-white font-bold w-fit bg-amber-900 px-4 p-1 mb-1">
                <h1>PASIEKA: {{$apiary->name}}</h1>
            </div>

            <table class="w-full text-sm text-left text-gray-500" >
                <thead class="text-xs text-white uppercase bg-amber-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nazwa ula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Typ ula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Liczba ramek
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($apiary->beehives as $beehive)
                <tr class="bg-amber-50 border-b hover:bg-amber-100">
                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                        {{$beehive->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$beehive->type}}
                    </td>
                    <td class="px-6 py-4">
                        {{$beehive->frames}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('beehives_edit', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="text-blue-400 px-2 py-2 rounded-xl">
                            <i class="fa-solid fa-pen-to-square"></i> Edytuj
                        </a>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <x-delete-form class="text-red-500" action="{{route('beehives_delete', ['apiary'=>$apiary, 'beehive' => $beehive])}}">
                        </x-delete-form>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    @else
        <p class="flex justify-center text-xl bg-red-100 p-4">Nie masz żadnych pasiek i uli</p>
    @endunless
</x-layout>
