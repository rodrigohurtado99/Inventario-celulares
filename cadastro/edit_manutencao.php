<?php

// incluindo a conexão ao banco
include('../conexao/conexao.php');
include('prot_login.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Registro</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
    </head>
    <body>
        <main class="container mt-4 mb-4 container-sm ">
            
    <?php
    // script utilizado para listar os celulares
    $url = $conexao->real_escape_string($_GET['userId']);
    if(isset($_GET)){
        $sql = "SELECT * FROM celulares WHERE id = '$url'";
        $query = $conexao->query($sql);

        while($row = mysqli_fetch_array($query)){
    ?>  
    
    <form enctype='multipart/form-data' method='POST' action="valida_formulario.php">
        <div class="card p-4 border border-light rounded shadow-lg text-dark">
            <h2 class="bg-dark text-center text-light p-3 rounded mb-4">Editar Cadastro</h2>

            <input type="hidden" name="userid" value="<?php echo($url)?>">
            <input type="hidden" name="valida_edicao">

            <div class="mb-3">
                <label class="form-label"><strong>ID</strong></label>
                <input type="text" class="form-control" name="id" value="<?php echo($row['id'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Usuário</strong></label>
                <input type="text" class="form-control" name="usuario" value="<?php echo($row['usuario'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Modelo</strong></label>
                <input type="text" class="form-control" name="modelo" value="<?php echo($row['modelo'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Armazenamento</strong></label>
                <input type="text" class="form-control" name="armaz" value="<?php echo($row['armazenamento'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>RAM</strong></label>
                <input type="text" class="form-control" name="ram" value="<?php echo($row['ram'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Centro de Custo</strong></label>
                <input type="text" class="form-control" name="centro-c" value="<?php echo($row['centro-de-custo'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>IMEI</strong></label>
                <input type="text" class="form-control" name="imei" value="<?php echo($row['imei'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Mac Address</strong></label>
                <input type="text" class="form-control" name="mac" value="<?php echo($row['mac-address'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Conta</strong></label>
                <input type="text" class="form-control" name="conta" value="<?php echo($row['conta'])?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Telefone</strong></label>
                <input type="text" class="form-control" name="tel" value="<?php echo($row['tel'])?>" autocomplete="off">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="../cadastro/ficha_tecnica.php?userId=<?php echo($url)?>" class="btn btn-warning">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>

        </div>
    </form>

    <?php
        }
    }
    
    $conexao->close();
    ?>

    </main>
</body>
</html>
