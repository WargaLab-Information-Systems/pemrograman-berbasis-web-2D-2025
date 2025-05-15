const html = document.documentElement;
    const btnLight = document.getElementById('btnLight');
    const btnDark = document.getElementById('btnDark');

        // Light mode
    btnLight.addEventListener('click', function () {
        html.classList.remove('dark');
    });

        // Dark mode
    btnDark.addEventListener('click', function () {
        html.classList.add('dark');
    });

        