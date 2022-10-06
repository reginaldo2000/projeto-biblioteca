<?php $this->layout("_tema-app"); ?>
<?php include __DIR__."/../modal-loading.php"; ?>

<h2>Categorias</h2>
<hr>

<?php showMessage(); ?>

<a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-nova-categoria">
    <i class="fa fa-plus"></i> Novo cadastro
</a>

<div class="table-responsive">
    <table id="tabelaCategorias" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-center text-uppercase">id</th>
                <th class="text-center text-uppercase">nome</th>
                <th class="text-center text-uppercase" colspan="2" style="width: 15%;">ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categorias)) : ?>
                <?php foreach ($categorias as $cat) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $cat->getId(); ?></td>
                        <td class="text-center"><?= $cat->getNome(); ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-sm" title="Editar" onclick="editarCategoria(<?= $cat->getId(); ?>);">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-danger btn-sm" title="Excluir" onclick="excluirCategoria(<?= $cat->getId(); ?>);">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">Nenhuma categoria encontrada!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- modal de nova categoria -->
<div class="modal fade" tabindex="-1" id="modal-nova-categoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= url("/app/categorias/salvar"); ?>" method="post" class="needs-validation" novalidate>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Nome da Categoria:</label>
                            <input type="text" name="nome" class="form-control" required>
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


<!-- modal de editar categoria -->
<div class="modal fade" tabindex="-1" id="modal-edicao-categoria" data-bs-backdrop="static">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post" id="formEdicaoCategoria" class="needs-validation" novalidate>
                <input type="hidden" name="_method" value="PUT" hidden>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12 mb-3">
                            <label>Nome da Categoria:</label>
                            <input type="text" name="nome" id="edit-nome" class="form-control" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Editar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- modal de excluir a categoria -->
<div class="modal fade" tabindex="-1" id="modal-excluir-categoria" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post" id="formExclusaoCategoria" class="needs-validation" novalidate>
                <input type="hidden" name="_method" value="DELETE" hidden>
                <div class="modal-body">
                    <p>Deseja realmente excluir a categoria <b class="categoria-nome"></b>?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Excluir
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>