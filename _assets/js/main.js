const btnMenu = document.querySelector(".btn-menu");
btnMenu.addEventListener("click", () => {
    const navbar = document.querySelector(".site-nav");
    const section = document.querySelector(".site-content");

    if(navbar.classList.contains("active")) {
        navbar.classList.remove("active");
        section.classList.remove("active");
    } else {
        navbar.classList.add("active");
        section.classList.add("active");
    }
})