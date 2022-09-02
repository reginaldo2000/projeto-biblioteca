<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOPS - <?= $codigo; ?></title>
    <link rel="stylesheet" href="http://localhost/sistema-biblioteca/_assets/css/erro.css">
</head>

<body>

    <main class="erro">

        <section class="conteudo">

            <h1>OOPS!!!</h1>

            <h2><?= $mensagem; ?></h2>

            <a href="<?= url("/app/inicio"); ?>">Página Inicial</a>

        </section>

    </main>

</body>

</html>