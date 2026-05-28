document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.querySelector('.menu-toggle');
    if (toggle) {
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('nav-open');
        });
    }

    var form = document.getElementById('callbackForm');
    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var name = form.fio.value.trim() || 'клиент';
            var phone = form.phone.value.trim();
            if (!phone) {
                alert('Укажите номер телефона, чтобы мы могли перезвонить.');
                return;
            }
            alert('Спасибо, ' + name + '! Мы свяжемся с вами в ближайшее время.');
            form.reset();
        });
    }
});
