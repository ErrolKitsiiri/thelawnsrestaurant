import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Swal from "sweetalert2";


window.Alpine = Alpine;
window.Swal = Swal;

Alpine.plugin(focus);
Alpine.start();

window.Toast = Swal.mixin({
    toast: true,
    position: "top-right",
    timerProgressBar: false,
    timer: 5000,
});


