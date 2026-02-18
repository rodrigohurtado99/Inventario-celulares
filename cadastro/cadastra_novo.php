<?php
    // Incluindo a função de conexão com a base de dados
    include("../conexao/conexao.php");
    include('prot_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Cadastrar Celular</title>
</head>

<body>
    <!--- Menu de Cadastro -->
    <main class="container mt-4 mb-4 p-4 border border-light rounded shadow-lg ">
        <h1 class="bg-dark text-center text-light p-3 rounded">Cadastrar novo celular</h1>

        <form method="POST" action="valida_formulario.php" class="p-4">
            <input type="hidden" name="valida_cadastro">
            <input type="hidden" name="data_atual">
            <div class="mb-3">
                <label class="form-label"><strong>ID - Número do Aparelho</strong></label>
                <input type="text" class="form-control" name="id" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Usuário</strong></label>
                <input type="text" class="form-control" name="usuario" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Modelo</strong></label>
                <input type="text" class="form-control" name="modelo" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Armazenamento</strong></label>
                <input type="text" class="form-control" name="armaz" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>RAM</strong></label>
                <input type="text" class="form-control" name="ram" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Centro de Custo</strong></label>
                <input type="text" class="form-control" name="centro-c" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>IMEI</strong></label>
                <input type="text" class="form-control" name="imei" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Mac Address</strong></label>
                <input type="text" class="form-control" name="mac" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Tipo</strong></label>
                <select name="escolha" class="form-control" required autocomplete="off">
                    <option value="" disabled selected><strong>Selecione o tipo de aparelho</strong></option>
                    <option value="celular">Celular</option>
                    <option value="tablet">Tablet</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Situação</strong></label>
                <select name="situacao" class="form-control" required>
                    <option value="" disabled selected><strong>Situação do aparelho</strong></option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Conta</strong></label>
                <input type="text" class="form-control" name="conta" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Telefone</strong></label>
                <input type="text" class="form-control" name="tel"  autocomplete="off">
            </div>
            <div class="d-flex justify-content-between">
                <a href="../cadastro/lista_celulares.php">
                    <button type="button" class="btn btn-warning">Voltar</button>
                </a> 
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
                
    </main>
</body>
</html>
