<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Inspekcje:</h1>

        <div class="mb-4">
            <label for="apiary" class="block text-lg font-medium">Wybierz pasiekę:</label>
            <select id="apiary" name="apiary" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">--Wybierz pasiekę--</option>
                @foreach ($apiaries as $apiary)
                    <option value="{{ $apiary->id }}" data-beehives="{{ json_encode($apiary->beehives) }}">{{ $apiary->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="rows" class="block text-lg font-medium">Liczba wierszy:</label>
                <input id="rows" type="number" min="1" value="2" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="columns" class="block text-lg font-medium">Liczba kolumn:</label>
                <input id="columns" type="number" min="1" value="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <button class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="renderBeehives()">
            Generuj planszę
        </button>

        <div id="beehives" class="grid gap-4 p-4 bg-gray-50 rounded-md"></div>
    </div>

    <script>
        document.getElementById('apiary').addEventListener('change', renderBeehives);

        function renderBeehives() {
            const apiarySelect = document.getElementById('apiary');
            const selectedOption = apiarySelect.options[apiarySelect.selectedIndex];
            const beehives = JSON.parse(selectedOption.getAttribute('data-beehives'));
            const beehivesDiv = document.getElementById('beehives');
            const rows = document.getElementById('rows').value;
            const columns = document.getElementById('columns').value;

            beehivesDiv.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
            beehivesDiv.innerHTML = ''; // Wyczyść zawartość diva

            if (beehives && beehives.length) {
                const numberOfCells = rows * columns;
                for (let i = 0; i < numberOfCells; i++) {
                    if (beehives[i]) {
                        const beehive = beehives[i];
                        const beehiveElement = `
                            <div class="bg-yellow-300 text-center rounded-lg shadow-lg p-4">
                                <p class="text-lg font-medium">${beehive.name}</p>
                            </div>
                        `;
                        beehivesDiv.innerHTML += beehiveElement;
                    } else {
                        beehivesDiv.innerHTML += `<div></div>`;
                    }
                }
            } else {
                beehivesDiv.innerHTML = '<p class="text-lg text-red-600">Brak uli dla wybranej pasieki.</p>';
            }
        }
    </script>
</x-layout>
