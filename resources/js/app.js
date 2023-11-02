import './bootstrap';

import toastr from 'toastr';
window.toastr = toastr;

toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    preventDuplicates: false,
    onclick: null,
    showDuration: '300',
    hideDuration: '1000',
    timeOut: '5000',
    extendedTimeOut: '1000',
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
};

async function toastrToast({ type, title, text }) {
    await toastr[type](text, title);
}

document.addEventListener('toastr-toast', (event) => {
    toastrToast(event.detail);
});

window.toastrToast = toastrToast;
