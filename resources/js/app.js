import './bootstrap';

// alpine.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// Slim Select
import { floraSlimSelect } from './flora-slim-select'; // Importuj funkcję z pliku slimselect-config.js
floraSlimSelect();

// import { feedingsSlimSelect } from './flora-slim-select'; // Importuj funkcję z pliku slimselect-config.js
// feedingsSlimSelect();

// Tippy.js
import {delegate} from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/shift-toward-subtle.css';

// Default configuration for Tippy with event delegation (https://atomiks.github.io/tippyjs/v6/addons/#event-delegation
delegate('body', {
    interactive: true,
    allowHTML: true,
    animation: 'shift-toward-subtle',
    target: '[data-tippy-content]',
});
