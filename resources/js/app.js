import './bootstrap';

// alpine.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// Slim Select
import { floraSlimSelect } from './flora-slim-select'; // Importuj funkcję z pliku slimselect-config.js
floraSlimSelect();

