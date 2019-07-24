var container = document.querySelector('.c-nav_menu-wrapper ');
var burger = document.querySelector('.c-nav_burger');
document.querySelector('.c-nav_burger').addEventListener('click', function (event) {
    event.preventDefault();

    if (!container.classList.contains('active')) {
        burger.classList.add('active');
        container.classList.add('active');
        container.style.height = 'auto';

        var height = container.clientHeight + 'px';

        container.style.height = '0px';

        setTimeout(function () {
            container.style.height = height;
        }, 0);
    } else {
        container.style.height = '0px';

        container.addEventListener('transitionend', function () {
            container.classList.remove('active');
            burger.classList.remove('active');
        }, {
                once: true
            });
    }
});