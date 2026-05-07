<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
    <link rel="stylesheet" href="../assets/estilo.css">
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <section class="cad_form">
            <form action="valida_formulario.php" method="post">
                <label for="usuario">Nome
                    <input type="text" name="usuario">
                </label>
                <label for="regra">Regra
                    <input type="text" name="regra">
                </label>
                <label for="senha">Senha
                    <input type="password" name="senha">
                </label>
                <input type="submit" value="Cadastrar">
            </form>
        </section>
    </main>
</body>
</html>