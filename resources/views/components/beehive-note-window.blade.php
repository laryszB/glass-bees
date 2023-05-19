@props(['apiary', 'beehive'])

<div x-data="{ disabled: true, originalText: '{{ $beehive->note }}', editText: '{{ $beehive->note }}', textareaBgColor: 'bg-yellow-500' }" class="fixed inset-0 flex items-center justify-center z-50" x-show="showModal" x-cloak>
    <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
    <div class="relative bg-yellow-500 rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-4">Notatka do ula {{ $beehive->name }}</h2>
        <form method="POST" action="{{ route('beehives_note_update', ['apiary' => $apiary, 'beehive' => $beehive]) }}">
            @csrf
            @method('PUT')
            <textarea x-model="editText" x-ref="editTextArea" :disabled="disabled" :class="textareaBgColor + ' text-medium font-semibold w-full text-black rounded p-1'" placeholder="Dodaj swoją notatkę do tego ula" name="note" id="note" rows="10">{{ $beehive->note }}</textarea>
            <div class="flex justify-end mt-4">
                <button x-show="disabled" x-on:click="disabled = false; textareaBgColor = 'bg-white'; $nextTick(() => $refs.editTextArea.focus())" type="button" class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edytuj</button>
                <button x-show="!disabled" type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold py-1 px-2 rounded mr-2">Zatwierdź edycję</button>
                <button x-show="!disabled" x-on:click="disabled = true; editText = originalText; textareaBgColor = 'bg-yellow-500'" type="button" class="bg-red-600 hover:bg-red-500 text-white font-bold py-1 px-2 rounded mr-2">Anuluj</button>
                <button x-on:click="disabled = true; editText = originalText; textareaBgColor = 'bg-yellow-500'" type="button" class="bg-blue-800 hover:bg-yellow-95 text-white font-bold py-1 px-2 rounded" @click="showModal = false">Zamknij</button>
            </div>
        </form>
    </div>
</div>
