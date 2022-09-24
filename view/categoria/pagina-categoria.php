<?php $this->layout("_tema-app"); ?>

<h2>Categorias</h2>
<hr>

<?php showMessage(); ?>

<a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-nova-categoria">
    <i class="fa fa-plus"></i> Novo cadastro
</a>


<!-- modal de nova categoria -->
<div class="modal fade" tabindex="-1" id="modal-nova-categoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= url("/app/categorias/salvar"); ?>" method="post">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="">Nome da Categoria:</label>
                            <input type="text" name="nome" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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