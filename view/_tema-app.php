<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - App</title>
    <link rel="stylesheet" href="<?= asset("/css/style.css"); ?>">
    <link rel="stylesheet" href="<?= asset("/css/components.css"); ?>">
    <link rel="stylesheet" href="<?= asset("/font-awesome-4.7.0/css/font-awesome.min.css"); ?>">
</head>

<body>
    <main class="site">
        <header class="site-header">
            <div class="descricao">
                <a href="#" class="btn-menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>

                <h1 class="titulo">Biblioteca - APP</h1>
            </div>

            <div class="usuario">
                <h2><?= session()->usuario->getNome(); ?></h2>
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
        </header>

        <nav class="site-nav active">
            <ul class="menu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Livros</a></li>
                <li><a href="#">Sair</a></li>
            </ul>
        </nav>

        <section class="site-content">

        </section>

        <footer class="site-footer">

        </footer>
    </main>

    <script src="<?= asset("/js/main.js"); ?>"></script>
</body>

</html>