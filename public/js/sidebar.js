const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll(".spanbar");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");
const subMenus = document.querySelectorAll('.sidebar__submenu'); // Seleccionar todos los submenús
const menuItems = document.querySelectorAll('.navegacion a'); // Obtener todas las opciones del menú lateral
const mainContent = document.querySelector('main'); // Obtener el elemento principal de contenido

function closeAllSubmenus() {
    subMenus.forEach(submenu => {
        submenu.classList.remove('show'); // Asegúrate de que 'show' es la clase que maneja la visibilidad
    });
}

function toggleMenuIcons() {
    // Agrega logs para debugging
    console.log("Cloud clicked");
    console.log("toggleMenuIcons: current class", barraLateral.classList.contains("max-barra-lateral"));
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
        closeAllSubmenus(); // Cierra los submenús al contraer la barra lateral
    }
}

menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    toggleMenuIcons();
    if (window.innerWidth <= 320) {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
    }
});

palanca.addEventListener("click", () => {
    let body = document.body;
    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click", () => {
    console.log("Cloud clicked");
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
        span.classList.toggle("oculto");
    });
    closeAllSubmenus();
    //toggleMenuIcons()
});