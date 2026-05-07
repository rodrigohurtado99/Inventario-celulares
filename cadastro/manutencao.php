<?php

include("../conexao/conexao.php");
include('prot_login.php');

// Passa uma variável pela URL, para depois ser utilizada na tabela como referência do ID     
$url = $conexao->real_escape_string($_GET['userId']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Histórico</title>
</head>

<body class="text-light">
    <main class="container mt-4  p-3 border rounded">
        <h2 class="bg-dark text-light p-3 rounded mb-4 text-center">Histórico de Manutenções</h2>
        
        <?php
            if ($_GET['userId']) {
                if (isset($_GET['num'])) {
                    $sql = "DELETE FROM manutencao WHERE num = " . $_GET['num'];
                    $conexao->query($sql);
                }

                $sql = "SELECT * FROM celulares
                        INNER JOIN manutencao ON celulares.id = manutencao.id
                        WHERE celulares.id = $url 
                        ORDER BY STR_TO_DATE(`data`, '%d-%m-%Y') DESC;";
                $result = $conexao->query($sql);

                if (mysqli_num_rows($result) == 0) {
                    echo("<h6 class='text-center text-primary my-4'>Não possui nenhum histórico de manutenção!</h6>");
                } else {
                    echo '<div class="row row-cols-1 row-cols-md-3 g-3">'; // Grid responsivo
                    while ($row = mysqli_fetch_array($result)) {
        ?>
        
        <div class="col">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header bg-dark text-light"><strong>Usuário:</strong> <?php echo($row['usuario'])?></div>
                <div class="card-body text-secondary">
                    <h6 class="card-title"><strong>Data da Manutenção:</strong> <?php echo($row['data'])?></h6>
                    <h6 class="card-title"><strong>Tipo:</strong> <?php echo($row['tipo'])?></h6>
                    <p class="card-text"><strong>Descrição:</strong> <?php echo($row['descricao'])?></p>
                    <a href='manutencao.php?userId=<?php echo ($url) ?>&num=<?php echo ($row['num']) ?>' onclick="return confirm('Deseja realmente excluir?')">
                        <button class='btn btn-danger btn-sm'>Excluir</button>
                    </a>
                </div>
            </div>
        </div>

        <?php
                    }
                    echo '</div>'; // Fechar a linha após todos os cards
                }
            }
            $conexao->close();
        ?>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="../cadastro/ficha_tecnica.php?userId=<?php echo($url); ?>" class="btn btn-warning">Voltar</a>
            <a href="nova_manutencao.php?userId=<?php echo($url); ?>" class="btn btn-success">Nova Manutenção</a>
            <a href="edit_manutencao.php?userId=<?php echo($url); ?>" class="btn btn-info">Editar Cadastro</a>
        </div>
    </main>
</body>

</html>
