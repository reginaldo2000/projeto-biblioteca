<?php $this->layout("_tema-app"); ?>
<?php include __DIR__ . "/_modal-salvar-livro.php"; ?>

<h2>Livros</h2>
<hr>

<?php showMessage(); ?>

<a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-salvar-livro">
    <i class="fa fa-plus"></i> Novo cadastro
</a>

<div class="table-responsive mt-3">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center text-uppercase">título</th>
                <th class="text-center text-uppercase">categoria</th>
                <th class="text-center text-uppercase">autor</th>
                <th class="text-center text-uppercase">data pub.</th>
                <th class="text-center text-uppercase" colspan="3" style="width: 10%;">ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $l) : ?>
                <tr class="align-middle">
                    <td><?= $l->getTitulo(); ?></td>
                    <td><?= $l->getCategoria()->getNome(); ?></td>
                    <td><?= $l->getAutor(); ?></td>
                    <td><?= $l->getDataPublicacao()->format("d/m/Y"); ?></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-secondary btn-sm" title="Visualizar">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-primary btn-sm" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btn-sm" title="Excluir">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>