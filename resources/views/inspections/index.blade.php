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

        <div id="beehives" class="p-4 bg-gray-50 rounded-md"></div>
    </div>

    <!-- Modal -->
    <div id="inspection-modal" class="fixed inset-0 z-10 hidden flex items-center justify-center" style="background-color: rgba(0,0,0,0.5);">
        <div class="bg-white rounded p-8">
            <form action="" method="POST" id="inspection-form" class="text-left"></form>
            <button class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="closeModal()">Zamknij</button>
        </div>
    </div>

{{--TODO: Zmień strukturę bazy danych. Dodać tabelę "bee_dangers" i połączyć relacją many to many z tabelą inspections.--}}

    <script>
        function openModal(beehive) {
            $('#inspection-form').html(`
        <input type="hidden" name="beehive_id" value="${beehive.id}">
        <div class="mb-4">
            <label for="name" class="block text-md font-medium">Nazwa</label>
            <p id="name" class="mt-1 p-2 border rounded-md">${beehive.name}</p>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-md font-medium">Status</label>
            <select id="status" name="status" class="mt-1 p-2 w-full border rounded-md">
                <option value="ok">OK</option>
                <option value="umiarkowane zagrożenie">Umiarkowane zagrożenie</option>
                <option value="poważne zagrożenie">Poważne zagrożenie</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="danger" class="block text-md font-medium">Niebezpieczeństwo</label>
            <select id="danger" name="danger" class="mt-1 p-2 w-full border rounded-md">
                <option value="brak matki">Brak matki</option>
                <option value="brak pożywienia">Brak pożywienia</option>
                <option value="choroba">Choroba</option>
                <option value="pasożyty">Pasożyty</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="note" class="block text-md font-medium">Notatka</label>
            <textarea id="note" name="note" class="mt-1 p-2 w-full border rounded-md">${beehive.note}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zapisz</button>
    `);
            $('#inspection-modal').removeClass('hidden');
        }



        function closeModal() {
            $('#inspection-modal').addClass('hidden');
        }

        $(document).ready(function () {
            $('#apiary').change(function () {
                var selectedOption = $(this).find('option:selected');
                var beehivesData = selectedOption.data('beehives');

                var content = '';
                if (beehivesData) {
                    content += '<div class="flex flex-wrap">';
                    $.each(beehivesData, function (key, beehive) {
                        content += '<div class="w-1/2 lg:w-1/5 flex-shrink-0 p-2">';
                        content += '<div class="bg-amber-800 p-4 text-center h-full rounded">';
                        content += '<p class="beehive-name block mb-2 font-bold text-2xl text-white">' + beehive.name + '</p>';
                        content += '<button class="conduct-inspection bg-yellow-500 hover:bg-yellow-600 font-semibold p-1 px-2 rounded" onclick="openModal(' + JSON.stringify(beehive).replace(/"/g, '&quot;') + ')">Przeprowadź inspekcję</button>';
                        content += '</div></div>';
                    });
                    content += '</div>';
                } else {
                    content = '<p class="text-red-500">Brak uli dla wybranej pasieki.</p>';
                }

                $('#beehives').html(content);
            });
        });
    </script>




</x-layout>
