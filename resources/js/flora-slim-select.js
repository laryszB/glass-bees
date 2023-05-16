export function floraSlimSelect() {
    new SlimSelect({
        select: '#flora',
        settings: {
            placeholderText: 'Wybierz rośliny',
            closeOnSelect: false,
            searchPlaceholder: 'Szukaj roślin...',
        }
    });
}

