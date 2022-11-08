(function () {

    let form = document.getElementById('deleteForm');

    if(form) {
        form.addEventListener('submit', submitForm);
    }

    function submitForm(event) {
        if(!confirm('Delete?')) {
            event.preventDefault();
        }
    }

})();