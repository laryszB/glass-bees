@props(['action'])

{{--Podaj argument "action" w celu usunięcia dowolnego obiektu. --}}
{{--Komponent jest przyciskiem Usuń z ikoną śmietnika.--}}
{{--Zawiera powiadomienie z potwierdzeniem akcji usunięcia.--}}

<form method="POST" action="{{ $action }}" x-data="{ confirmDelete: false }">
    @csrf
    @method('DELETE')

    <button {{$attributes->merge(['class' => 'text-red-500'])}} @click.prevent="confirmDelete = true">
        <i class="fa-solid fa-trash"></i>
        Usuń
    </button>

    <div x-show="confirmDelete" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded">
            <p>Czy na pewno chcesz usunąć?</p>
            <div class="mt-4 flex justify-end">
                <button class="mr-2" @click.prevent="confirmDelete = false">Anuluj</button>
                <button type="submit" class="text-red-500">Potwierdź</button>
            </div>
        </div>
    </div>
</form>
