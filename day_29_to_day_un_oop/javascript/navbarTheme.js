let navbar = document.getElementById('navbar');
let navbarThemeColors = document.getElementsByClassName('nav-bar-theme-color');
let navbarThemeForm = document.getElementById('navbarThemeForm');


// Adding active class to the current color navbar
let currentColorInfo = document.getElementById('currentColorInfo');
let currentColor = currentColorInfo.dataset.currentColor;

let currentColorButtonItem=document.getElementById(`${currentColor}-navbar`);
currentColorButtonItem.classList.add('active-navbarTheme','active');


Array.from(navbarThemeColors).forEach((navbarThemeColor) => {
    navbarThemeColor.addEventListener('click', (e) => {
        // Grabbing previous theme and removing it
        let previousTheme = document.querySelector('.active-navbarTheme');
        let previousThemeColor = previousTheme.dataset.color;
        previousTheme.classList.remove('active-navbarTheme');
        previousTheme.classList.remove('active');

        navbar.classList.remove(`bg-${previousThemeColor}`);

        // Adding new theme 
        let newThemeColor = e.target.dataset.color;
        e.target.classList.add('active-navbarTheme');
        e.target.classList.add('active');
        navbar.classList.add(`bg-${newThemeColor}`);


        // For white theme or other theme | To make text dark in the navbar
        if ((previousThemeColor == "light" || previousThemeColor == "warning" || previousThemeColor=="danger" || previousThemeColor=="success") && (newThemeColor != "light" || newThemeColor != "warning" || newThemeColor !="danger" || newThemeColor !="success")) {
            navbar.classList.add('navbar-dark');
        }

        if ((newThemeColor == "light" || newThemeColor == "warning" || newThemeColor=="danger" || newThemeColor=="success") && navbar.classList.contains('navbar-dark')) {
            navbar.classList.remove('navbar-dark');
        }

    })

})


// When the navbar color is selected the form gets submitted
navbarThemeForm.addEventListener('submit', (e) => {
    let username = document.getElementById('navbar-username').value;
    let navBarTheme = document.querySelector('.active-navbarTheme').dataset.color;
    e.preventDefault();
    let data = {
        username,
        navBarTheme
    };


    fetch('/lakashojt/day_29/partials/_handleNavbarTheme.php', {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => response.text()).then(d => {
        if (d != "Ok") {
            console.log("Some error occured");
        }
    })
})
