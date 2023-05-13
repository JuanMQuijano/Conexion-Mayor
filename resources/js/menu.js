(function () {
    //Selecciona el btn de menu y el menu
    const btnMenu = document.querySelector("#btn-menu");
    const menu = document.querySelector("#menu");

    //Valida el ancho de la pantalla y si cumple la condicion elimina la clase del elemento
    if (window.screen.width >= 768) {
        menu.classList.remove("mostrar");
    }

    //Si encuentra el btn, agrega un eventListener y altera el estado de sus clases
    if (btnMenu) {
        btnMenu.addEventListener("click", () => {
            menu.classList.toggle("mostrar");
        });
    }
})();
