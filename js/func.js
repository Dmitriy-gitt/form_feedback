document.addEventListener('DOMContentLoaded', function() {
    let toggleButtons = document.querySelectorAll('.toggle-form');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            let form = this.nextElementSibling;
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    });
});