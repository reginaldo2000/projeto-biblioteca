<div class="col-lg-12 mb-3">
    <label>Título:</label>
    <span class="form-control"><?= $livro->getTitulo() ?: "Não informado"; ?></span>
</div>

<div class="col-lg-12 mb-3">
    <label>Resumo:</label>
    <span class="form-control" style="min-height: 120px;"><?= $livro->getResumo() ?: "Não informado"; ?></span>
</div>

<div class="col-lg-12 mb-3">
    <label>Categoria:</label>
    <span class="form-control"><?= $livro->getCategoria()->getNome() ?: "Não informado"; ?></span>
</div>

<div class="col-lg-6 mb-3">
    <label>Autor:</label>
    <span class="form-control"><?= $livro->getAutor() ?: "Não informado"; ?></span>
</div>

<div class="col-lg-6 mb-3">
    <label>Data Publicação:</label>
    <span class="form-control"><?= $livro->getDataPublicacao()->format("d/m/Y") ?: "Não informado"; ?></span>
</div>