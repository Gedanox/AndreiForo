(function () {

    var table = document.getElementById('bikeTable');

    if(table) {
        table.addEventListener('click', clickTable);
    }

    function clickTable(event) {
        var target = event.target;
        if(target.tagName === 'A' && target.getAttribute('class') === 'deleteRow') {
            //let action = target.getAttribute('data-url');
            //let action = element.dataset.url;
            let name = target.dataset.name;
            let url = target.dataset.url;
            confirmDelete(name, url);
        }
    }

    function confirmDelete(name, url) {
        let form = document.getElementById('deleteForm');
        if(confirm('Delete ' + name + '?')) {
            form.action = url;
            form.submit();
        } else {
            form.action = '';
        }
    }

})();