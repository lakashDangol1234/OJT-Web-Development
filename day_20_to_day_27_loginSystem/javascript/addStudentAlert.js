let addedAlert = document.getElementById('added-alert');
addedAlert.classList.remove('d-none');
setTimeout(() => {
    addedAlert.classList.add('d-none');
}, 5000);