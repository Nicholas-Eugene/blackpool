document.addEventListener('DOMContentLoaded', () => {
    let searchBtn = document.querySelector('#search-btn');
    let searchBar = document.querySelector('.search-bar-container');

    if (searchBtn && searchBar) {
        searchBtn.addEventListener('click', () => {
            searchBtn.classList.toggle('fa-times');
            searchBar.classList.toggle('active');

            let isExpanded = searchBtn.classList.contains('fa-times');
            searchBtn.setAttribute('aria-expanded', isExpanded);
            searchBar.setAttribute('aria-hidden', !isExpanded);
        });
    }

    let menu = document.querySelector('#menu-bar');
    let navbar = document.querySelector('.navbar');

    if (menu && navbar) {
        menu.addEventListener('click', () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');

            let isExpanded = menu.classList.contains('fa-times');
            menu.setAttribute('aria-expanded', isExpanded);
            navbar.setAttribute('aria-hidden', !isExpanded);
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('header');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 30) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
