<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibliotecaApp - Login</title>
    <link rel="stylesheet" href="<?= asset("/css/login.css"); ?>">
    <link rel="stylesheet" href="<?= asset("/css/components.css"); ?>">
</head>

<body>
    <main class="login">
        <div class="logo">
            <img src="<?= asset("/images/logo.png"); ?>" alt="Logo do Site" title="Logo do Site">
        </div>

        <div class="form-login">
            <form method="POST" action="<?= url("/app/autenticar"); ?>" autocomplete="off">
                <div class="row">

                    <div class="col-12">
                        <label for="usuario">Usuário:</label>
                        <input type="text" name="login" id="usuario">
                    </div>

                    <div class="col-12">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn-azul wt-100">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>