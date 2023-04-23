(function () {
    const btnMenu = document.querySelector("#btn-menu");
    const menu = document.querySelector("#menu");

    if (window.screen.width >= 768) {
        menu.classList.remove("mostrar");
    }

    if (btnMenu) {
        btnMenu.addEventListener("click", () => {
            menu.classList.toggle("mostrar");
        });
    }
})();
