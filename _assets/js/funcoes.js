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

const visualizarLivro = (id) => {
    const URL = `${URL_BASE}/app/livros/visualizar/${id}`;
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: URL,
        success: (response) => {
            $('#dados-livro').html(response.render);
            $('#modal-visualizar-livro').modal('show');
        },
        error: (exception) => {
            console.log(exception);
        }
    });
}

const prepareEdicaoLivro = (id) => {
    const URL = `${URL_BASE}/app/livros/prepare-edicao/${id}`;
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: URL,
        success: (response) => {
            $('#form-salvar-livro').html(response.render);
            $('#form-salvar-livro').attr('action', `${URL_BASE}/app/livros/editar/${id}`);
            $('#modal-salvar-livro').modal('show');
        },
        error: (exception) => {
            console.log(exception);
        }
    });
}

const novoLivro = () => {
    const URL = `${URL_BASE}/app/livros/novo`;
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: URL,
        success: (response) => {
            $('#form-salvar-livro').html(response.render);
            $('#form-salvar-livro').attr('action', `${URL_BASE}/app/livros/salvar`);
            $('#modal-salvar-livro').modal('show');
        },
        error: (exception) => {
            console.log(exception);
        }
    });
}