window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('transparent');
        email.classList.add('transparent');
        phone-numbre.classList.add('transparent');
    } else {
        navbar.classList.remove('transparent');
        email.classList.remove('transparent');
        phone-numbre.classList.remove('transparent');
    }
});

// Fermer la navbar lorsque vous cliquez sur un élément de la liste
document.querySelectorAll('.nav-link').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelector('.navbar-collapse').classList.remove('show');
    })
});