export function floraSlimSelect() {
    new SlimSelect({
        select: '#flora',
        settings: {
            placeholderText: 'Wybierz rośliny',
            closeOnSelect: false,
            searchPlaceholder: 'Szukaj roślin...',
        }
    });

    new SlimSelect({
        select: '#beehive_accessory',
        settings: {
            placeholderText: 'Wybierz akcesoria',
            closeOnSelect: false,
            searchPlaceholder: 'Szukaj akcesoriów...',
        }
    });
}

export function feedingsSlimSelect() {
    new SlimSelect({
        select: '#apiary_id',
        settings: {
            placeholderText: 'Wybierz pasiekę',
            searchPlaceholder: 'Szukaj pasieki...',
        }
    });

    new SlimSelect({
        select: '#beehive_ids',
        settings: {
            placeholderText: 'Wybierz ule',
            closeOnSelect: false,
            searchPlaceholder: 'Szukaj uli',
        }
    });

    new SlimSelect({
        select: '#food_id',
        settings: {
            placeholderText: 'Wybierz pokarm',
            searchPlaceholder: 'Szukaj pokarmu...',
        }
    });
}

