const URL_BASE = "http://localhost/sistema-biblioteca";
// const URL_BASE = "http://reginaldo.com.br/sistema-biblioteca";

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()

const btnMenu = document.querySelector(".btn-menu");
btnMenu.addEventListener("click", () => {
    const navbar = document.querySelector(".site-nav");
    const section = document.querySelector(".site-content");

    if (navbar.classList.contains("active")) {
        navbar.classList.remove("active");
        section.classList.remove("active");
    } else {
        navbar.classList.add("active");
        section.classList.add("active");
    }
})

