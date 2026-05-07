<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
}

/* Container principal */
.login-container {
    display: flex;
    height: 100vh;
}

/* Lado esquerdo */
.left-side {
    flex: 1;
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    display: flex;
    align-items: center;
    justify-content: center;
}

.left-side img {
    max-width: 70%;
}

/* Lado direito */
.right-side {
    flex: 1;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card */
.login-box {
    width: 100%;
    max-width: 350px;
}

.form-control {
    border-radius: 8px;
}

.btn-login {
    background: #0ea5e9;
    border: none;
    border-radius: 8px;
}

.btn-login:hover {
    background: #0284c7;
}

/* Mobile */
@media(max-width: 768px){
    .left-side {
        display: none;
    }
}
</style>
</head>

<body>

<div class="login-container">

    <!-- LADO ESQUERDO -->
    <div class="left-side">
        <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png">
    </div>

    <!-- LADO DIREITO -->
    <div class="right-side">

        <div class="login-box">

            <h3 class="text-center mb-4">LOGIN</h3>

            <!-- ERRO PHP -->
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger text-center">
                    <?= $erro ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="../cadastro/valida_login.php">

                <!-- Usuário -->
                <div class="mb-3">
                    <label>Usuário</label>
                    <input type="text" name="usuario" class="form-control" placeholder="" required>
                </div>

                <!-- Senha -->
                <div class="mb-2">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="" required>
                </div>

                <!-- Lembrar + esqueceu -->
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <input type="checkbox"> Lembrar
                    </div>
                    <a href="#" class="text-decoration-none">Esqueceu a senha?</a>
                </div>

                <!-- Botão -->
                <div class="d-grid">
                    <button class="btn btn-login text-white">Entrar</button>
                </div>

                <!-- Cadastro -->
                <div class="text-center mt-3">
                    <small>Não tem conta? <a href="#">Cadastrar</a></small>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>