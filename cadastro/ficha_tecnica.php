<?php
    include('../conexao/conexao.php');
    include('prot_login.php');
    $id = $conexao->real_escape_string($_GET['userId']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
 
    <title>Informações do Aparelho</title>
</head>
<body>
    <main class="container mt-4 p-4 border rounded shadow-lg">
        <?php 
        if (isset($_GET['userId']) && filter_var($_GET['userId'], FILTER_VALIDATE_INT)) { 
            $id = (int) $_GET['userId']; 
            $id = $conexao->real_escape_string($_GET['userId']);
            
            // Consulta para buscar as informações do aparelho no banco
            $query = "SELECT * FROM celulares WHERE id = '$id'";
            $result_query = $conexao->query($query);
            
            while($row = mysqli_fetch_array($result_query)){
        ?>
                <div class="table-responsive table-bordered">
                    <h2 class="text-center text-light mb-4 bg-dark">Informações do Aparelho</h2>
                    <table class="table table-striped table-hover text-light ">
                        <tbody>
                            <tr>
                                <th>Usuário</th>
                                <td><?php echo($row['usuario']) ?></td>
                            </tr>
                            <tr>
                                <th>Modelo</th>
                                <td><?php echo($row['modelo'])?></td>
                            </tr>
                            <tr>
                                <th>Armazenamento</th>
                                <td><?php echo($row['armazenamento']) ?></td>
                            </tr>
                            <tr>
                                <th>RAM</th>
                                <td><?php echo($row['ram'])?></td>
                            </tr>
                            <tr>
                                <th>Centro de Custo</th>
                                <td><?php echo($row['centro-de-custo'])?></td>
                            </tr>
                            <tr>
                                <th>IMEI</th>
                                <td><?php echo($row['imei'])?></td>
                            </tr>
                            <tr>
                                <th>Mac-address</th>
                                <td><?php echo($row['mac-address'])?></td>
                            </tr>
                            <tr>
                                <th>Conta</th>
                                <td><?php echo($row['conta'])?></td>
                            </tr>
                            <tr>
                                <th>Telefone</th>
                                <td><?php echo($row['tel'])?></td>
                            </tr>
                            <tr>
                                <th>Situação</th>
                                <td><?php echo($row['situacao'])?></td>
                            </tr>
                            <tr>
                                <th>Patrimônio</th>
                                <td><?php echo($row['patrimonio'])?></td>
                            </tr>
                            <tr>
                                <th>Criado em</th>
                                <td><?php $data_atual = new DateTime($row['data_atual']); echo $data_atual->format('d/m/Y'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <nav class="d-flex justify-content-between mt-4">
                    <a href="../cadastro/lista_celulares.php">
                        <button class="btn btn-warning">Voltar</button>
                    </a>
                    <a href="../cadastro/nova_manutencao.php?userId=<?php echo($id); ?>">
                        <button class="btn btn-success">Nova Manutenção</button>
                    </a>
                    <a href="../cadastro/edit_manutencao.php?userId=<?php echo($id); ?>">
                        <button class="btn btn-primary">Editar Cadastro</button>
                    </a>
                    <a href="../cadastro/manutencao.php?userId=<?php echo($id); ?>">
                        <button class="btn btn-info">Histórico</button>
                    </a>
                </nav>
        <?php
            }
        }
        $conexao->close();
        ?>
    </main>
</body>
</html>
