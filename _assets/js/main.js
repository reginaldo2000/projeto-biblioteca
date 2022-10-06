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

const editarCategoria = (id) => {
    const url = `${URL_BASE}/app/categorias/get/${id}`;
    $("#modal-loading").modal("show");
    fetch(url)
        .then(response => {
            return response.json();
        })
        .then(data => {
            if (data.erro) {
                throw new Error(data.msg);
            }
            let form = document.getElementById("formEdicaoCategoria");
            form.setAttribute("action", `${URL_BASE}/app/categorias/editar/${data.obj.id}`);

            document.getElementById("edit-nome").value = data.obj.nome;
            $("#modal-loading").modal("hide");
            $("#modal-edicao-categoria").modal("show");
        })
        .catch(ex => {
            console.log(ex.message);
        })
}

const excluirCategoria = (id) => {
    const url = `${URL_BASE}/app/categorias/get/${id}`;
    fetch(url)
        .then(response => {
            return response.json();
        })
        .then(data => {
            if (data.erro) {
                throw new Error(data.msg);
            }
            let form = document.getElementById("formExclusaoCategoria");
            form.setAttribute("action", `${URL_BASE}/app/categorias/excluir/${data.obj.id}`);

            document.querySelector(".categoria-nome").innerHTML = data.obj.nome;

            new bootstrap.Modal('#modal-excluir-categoria', {}).show();
        })
        .catch(ex => {
            console.log(ex.message);
        })
}