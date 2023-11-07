import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

//? ---- Elimina un mensaje de alerta ----
const alertMessage = document.querySelector('.alert-message')
if( alertMessage ) {
    setTimeout(()=> {
        alertMessage.remove()
    }, 3000)
}