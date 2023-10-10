var select = new SlimSelect({
    select: '#beehive_numbers',
    settings: {
        placeholderText: 'Wybierz numery uli',
        closeOnSelect: false,
        searchPlaceholder: 'Szukaj numerów uli...',
    }
});

var messageBox = document.getElementById('messageBox');
var messageText = document.getElementById('messageText');
var closeMessage = document.getElementById('closeMessage');

document.getElementById('selectRange').addEventListener('click', handleSelectRange);
document.getElementById('clearSelection').addEventListener('click', clearSelection);
document.getElementById('closeMessage').addEventListener('click', hideMessage);

function handleSelectRange() {
    var minNumber = parseInt(document.getElementById('minNumber').value);
    var maxNumber = parseInt(document.getElementById('maxNumber').value);

    if (!isNaN(minNumber) && !isNaN(maxNumber) && minNumber >= 1 && maxNumber <= 100) {
        var numbersToSelect = [];
        for (let i = minNumber; i <= maxNumber; i++) {
            numbersToSelect.push(i.toString());
        }
        select.setSelected(numbersToSelect);
    } else {
        clearSelection();
        showMessage("Podaj prawidłowy zakres numerów uli od 1 do 100.");
    }
}

function clearSelection() {
    select.setSelected([]);
    hideMessage();
}

function showMessage(message) {
    messageText.textContent = message;
    messageBox.style.display = 'block';
}

function hideMessage() {
    messageBox.style.display = 'none';
}
