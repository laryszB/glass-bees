<div class="flex flex-wrap" >
    <div class="lg:w-1/5 p-4">
        <div class="bg-amber-50 rounded-lg shadow overflow-hidden transform hover:scale-105 transition-transform duration-300"
             x-data="{ isHovered: false }"
             @mouseover="isHovered = true"
             @mouseout="isHovered = false"
        >
            <div class="h-60 relative">
                <img src="images/apiary_poster.jpg" alt="Opis obrazka" class="object-cover w-full h-full">
                <div x-show="!isHovered"
                     class="absolute inset-0 bg-laravel"
                     :class="{ 'opacity-10': isHovered, 'opacity-30': !isHovered }"
                >
                </div>
            </div>
            <div class="p-4 flex-grow">
                <h3 class="text-3xl text-amber-600 text-center font-bold mb-2">Pasieki</h3>
                <p class="text-gray-700 text-lg">
                    Dzięki prostemu mechanizmowi tworzenia pasieki w łatwy sposób utworzysz swój model,
                    a następnie przypiszesz do niego ule, rodziny pszczele, a także odpowiadające Ci akcesoria.
                    W ten sposób będziesz mógł przechowywać informacje o swojej pasiece w przejrzysty sposób.
                </p>
            </div>
        </div>
    </div>

    <div class="lg:w-1/5 p-4">
        <div class="bg-amber-50 rounded-lg shadow overflow-hidden transform hover:scale-105 transition-transform duration-300"
             x-data="{ isHovered: false }"
             @mouseover="isHovered = true"
             @mouseout="isHovered = false"
        >
            <div class="h-60 relative">
                <img src="images/beehive_poster.jpg" alt="Opis obrazka" class="object-cover w-full h-full">
                <div x-show="!isHovered"
                     class="absolute inset-0 bg-laravel"
                     :class="{ 'opacity-10': isHovered, 'opacity-30': !isHovered }"
                >
                </div>
            </div>
            <div class="p-4 flex-grow">
                <h3 class="text-3xl text-amber-600 text-center font-bold mb-2">Ule</h3>
                <p class="text-gray-700 text-lg">
                    W prosty sposób przypiszesz ule do wybranej pasieki i uzupełniesz interesujące Cię informacje.
                    Każdemu ulowi przyporządkujesz matkę i rodzinę. Możesz również sporządzać nototaki dla każdego ula,
                    a następnie eksportować szczegółowy raport do PDF-a.
                </p>
            </div>
        </div>
    </div>

    <div class="lg:w-1/5 p-4">
        <div class="bg-amber-50 rounded-lg shadow overflow-hidden transform hover:scale-105 transition-transform duration-300"
             x-data="{ isHovered: false }"
             @mouseover="isHovered = true"
             @mouseout="isHovered = false"
        >
            <div class="h-60 relative">
                <img src="images/bees_poster.jpg" alt="Opis obrazka" class="object-cover w-full h-full">
                <div x-show="!isHovered"
                     class="absolute inset-0 bg-laravel"
                     :class="{ 'opacity-10': isHovered, 'opacity-30': !isHovered }"
                >
                </div>
            </div>
            <div class="p-4 flex-grow">
                <h3 class="text-3xl text-amber-600 text-center font-bold mb-2">Pszczoły</h3>
                <p class="text-gray-700 text-lg">
                    Glass Bees pozwala na sprawną kontrolę kondycji Twoich pszczół. Możesz łatwo zapisać informacje dotyczące matki pszczelej oraz rodziny.
                    Kontroluj choroby trawiące Twoje ule oraz pokarm, który podawany jest Twoim pszczołom.
                    Usprawnij dbanie o swoją hodowlę.
                </p>
            </div>
        </div>
    </div>

    <div class="lg:w-1/5 p-4">
        <div class="bg-amber-50 rounded-lg shadow overflow-hidden transform hover:scale-105 transition-transform duration-300"
             x-data="{ isHovered: false }"
             @mouseover="isHovered = true"
             @mouseout="isHovered = false"
        >
            <div class="h-60 relative">
                <img src="images/weather_poster.jpg" alt="Opis obrazka" class="object-cover w-full h-full">
                <div x-show="!isHovered"
                     class="absolute inset-0 bg-laravel"
                     :class="{ 'opacity-10': isHovered, 'opacity-30': !isHovered }"
                >
                </div>
            </div>
            <div class="p-4 flex-grow">
                <h3 class="text-3xl text-amber-600 text-center font-bold mb-2">Pogoda</h3>
                <p class="text-gray-700 text-lg">
                    Kontroluj pogodę tak, aby nic Cię nie zaskoczyło. Dzięki Glass Bees masz natychmiastowy wgląd w pogodę w Twojej pasiece.
                    Moduł ten pozwala Ci planować z wyprzedzeniem wszelkie prace. Prognozy dostarczane są w oparciu o zewnętrzne API zaimplementowane do systemu.
                </p>
            </div>
        </div>
    </div>

    <div class="lg:w-1/5 p-4">
        <div class="bg-amber-50 rounded-lg shadow overflow-hidden transform hover:scale-105 transition-transform duration-300"
             x-data="{ isHovered: false }"
             @mouseover="isHovered = true"
             @mouseout="isHovered = false"
        >
            <div class="h-60 relative">
                <img src="images/harvest_poster.jpg" alt="Opis obrazka" class="object-cover w-full h-full">
                <div x-show="!isHovered"
                     class="absolute inset-0 bg-laravel"
                     :class="{ 'opacity-10': isHovered, 'opacity-30': !isHovered }"
                >
                </div>
            </div>
            <div class="p-4 flex-grow">
                <h3 class="text-3xl text-amber-600 text-center font-bold mb-2">Zbiory</h3>
                <p class="text-gray-700 text-lg">
                    Twórz raporty ze swoich zbiorów i zbieraj informacje odnośnie wydajności swoich pasiek i uli.
                    Dzięki mechanizmom Glass Bees każdy Twój zbiór może być szybko zaklasyfikowany i zapisany na Twoim koncie.
                    Dzięki temu w jednym miejscu będziesz mógł trzymać informacje o swojej produkcji.
                </p>
            </div>
        </div>
    </div>

</div>
