<?php

    include("../conexao/conexao.php");

    include("prot_login.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <title>Manutenção de Celulares</title>

        <!-- AUTOCOMPLETE JS -->
    <script src="../assets/script.js"></script>
</head>
<body>

    <div class="container py-5">
        <h1 class="text-center text-light mb-4 bg-dark">Sistema de Manutenção de Celulares</h1>
        
        <!-- Formulário de busca -->
        <div class="mb-4">
            <form id="search-form" method="GET" action="../cadastro/ficha_tecnica.php">
            <input type="hidden" name="userId" id="userId">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" id="idq" autocomplete="off" placeholder="Informe o ID/Usuário" required>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <!-- Dropdown para filtrar -->
        <div class="d-flex justify-content-between mb-4">
            <div class="dropdown">

                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filtrar por
                </button>

                <ul class="dropdown-menu">
                    <li><a href="../cadastro/lista_celulares.php" class="dropdown-item">Inicio</a></li>
                    <li><a class="dropdown-item" href="?model=celular">Celulares</a></li>
                    <li><a class="dropdown-item" href="?model=tablet">Tablets</a></li>
                    <li><a class="dropdown-item" href="?itens=descartados">Descartados</a></li>
                </ul>
            </div>


        <!-- Cadastrar novo celular -->
            <a href="../cadastro/cadastra_novo.php" class="btn btn-success">Cadastrar aparelho</a>
            <a href="../cadastro/logout.php" class="btn btn-info">Sair</a>
        </div>
        

        <main class="lista-container">
            <?php
        // Lógica de busca e filtro
            $model = isset($_GET['model']) ? $conexao->real_escape_string($_GET['model']) : null;
            $descartados = isset($_GET['itens']) ? $conexao->real_escape_string($_GET['itens']) : null;
            $search = isset($_GET['q']) ? $conexao->real_escape_string($_GET['q']) : null;
            $query = "SELECT * FROM celulares";
            
            if ($model) { 
                $query .= " WHERE tipo = '$model' AND deleted_at IS NULL";
            } elseif ($search) {
                $query .= " WHERE `usuario` LIKE '%$search%' OR `id` LIKE '%$search%'";
            } elseif ($descartados) {
                $query .= " WHERE deleted_at IS NOT NULL";
            } else {
                $query .= " WHERE deleted_at IS NULL";
            }

        // Exclusão de registro
            if (isset($_POST['del'])) {
                $btndelete = $conexao->real_escape_string($_POST['del']);
                $query_delete = "UPDATE celulares SET deleted_at = NOW(), situacao = 'Descartado' WHERE id = '$btndelete'";
                $conexao->query($query_delete);
            }

            $result_query = $conexao->query($query);
            $total = mysqli_num_rows($result_query);
            ?>
            
        <!-- Tabela de resultados -->
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuário</th>
                            <th>Modelo</th>
                            <th>Armazenamento</th>
                            <th>RAM</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result_query)): ?>
                            <tr>
                                <td><strong><?php echo $row['id']; ?></strong></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['modelo']; ?></td>
                                <td><?php echo $row['armazenamento']; ?></td>
                                <td><?php echo $row['ram']; ?></td>
                                <td>
                                    <a href="../cadastro/ficha_tecnica.php?userId=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                        <span class='material-symbols-outlined'>visibility</span>
                                    </a>
                                    
                                    <form action="../cadastro/lista_celulares.php" method="post" style="display: inline;">
                                        <input type="hidden" name="del" value="<?php echo $row['id']; ?>" >
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo excluir esse registro?')">
                                            <span class='material-symbols-outlined'>delete</span>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center"><strong>Total: <?php echo $total; ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>
           
</body>
</html>
