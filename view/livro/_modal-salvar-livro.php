<div class="modal fade" tabindex="-1" id="modal-salvar-livro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= url("/app/livros/salvar"); ?>" method="post" id="form-salvar-livro" class="needs-validation" novalidate>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12 mb-3">
                            <label>Título:</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Resumo:</label>
                            <textarea name="resumo" class="form-control" required></textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Categoria:</label>
                            <select name="categoria" class="form-control" required>
                                <option value="">Selecione uma...</option>
                                <?php foreach ($categorias as $c) : ?>
                                    <option value="<?= $c->getId(); ?>"><?= $c->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label>Autor:</label>
                            <input type="text" name="autor" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label>Data Publicação:</label>
                            <input type="date" name="data_publicacao" class="form-control" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Salvar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>