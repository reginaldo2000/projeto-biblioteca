const btnMenu = document.querySelector(".btn-menu");
btnMenu.addEventListener("click", () => {
    const navbar = document.querySelector(".site-nav");
    if(navbar.classList.contains("active")) {
        navbar.classList.remove("active");
    } else {
        navbar.classList.add("active");
    }
})