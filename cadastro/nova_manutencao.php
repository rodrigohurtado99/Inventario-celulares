<?php
    // INCLUI A CONEXÃO AO BANCO DE DADOS NA PÁGINA
    include("../conexao/conexao.php");
    include('prot_login.php');

    // PEGA O ID PARA ABAIXO SER USADO NA EXECUÇÃO DO CÓDIGO
    $url = $conexao->real_escape_string($_GET['userId']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Nova Manutenção</title>
</head>

<body class="text-light">
    <main class="container mt-4 p-4 border rounded shadow-lg ">
        <?php
        // SE O ID FOR PASSADO VAI LISTAR TODAS AS MANUTENÇÕES, SE NÃO HOUVER NÃO APARECERÁ NENHUMA
        if (isset($_GET['userId'])) {
            $sql = "SELECT * from celulares WHERE `celulares`.`id` = '$url'";
            $query = $conexao->query($sql);
            $row = mysqli_fetch_array($query);
        ?>
        <div class="text-dark">
            <h2 class="bg-dark text-center text-light p-3 rounded mb-4">Nova Manutenção</h2>

            <form action="valida_formulario.php" method="POST">
                <input type="hidden" name="id" value="<?php echo($url)?>">
                <input type="hidden" name="valida_nova_manutencao">

                <div class="mb-3">
                    <label class="form-label">Usuário</label>
                    <input type="text" class="form-control" name="usuario_manutencao" value="<?php echo($row['usuario'])?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Manutenção</label>
                    <input type="date" class="form-control" name="data" value="<?php echo(date('Y-m-d'))?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo da Manutenção</label>
                    <select class="form-control" name="escolha">
                        <option value="interna">Interna</option>
                        <option value="externa">Externa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" class="form-control" name="descricao" autocomplete="off">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="../cadastro/ficha_tecnica.php?userId=<?php echo($url)?>" class="btn btn-warning">Voltar</a>
                    <button type="submit" class="btn btn-success">Criar Manutenção</button>
                </div>
            </form>
        </div>

        <?php
        }

       
        ?>
    </main>
</body>

</html>
