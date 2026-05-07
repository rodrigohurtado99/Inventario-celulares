<?php
    // INCLUI A CONEXÃO AO BANCO DE DADOS
    include("../conexao/conexao.php");
    include('prot_login.php');
    

    // VALIDA FORMULÁRIO DA PÁGINA cadastra_novo
    if (isset($_POST['valida_cadastro'])) {
        // Protege as strings capturadas

        $_SESSION['msg'] = "Cadastro realizado com sucesso"; 
        $id = $conexao->real_escape_string(($_POST['id']));
        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $modelo = $conexao->real_escape_string($_POST['modelo']);
        $armazenamento = $conexao->real_escape_string($_POST['armaz']);
        $ram = $conexao->real_escape_string($_POST['ram']);
        $centrodecusto = $conexao->real_escape_string($_POST['centro-c']);
        $imei = $conexao->real_escape_string($_POST['imei']);
        $mac = $conexao->real_escape_string($_POST['mac']);
        $tipo = $conexao->real_escape_string($_POST['escolha']);
        $conta = $conexao->real_escape_string($_POST['conta']);
        $num = $conexao->real_escape_string($_POST['tel']);
        $situacao = $conexao->real_escape_string($_POST['situacao']);
        $patrimonio = $conexao->real_escape_string($_POST['patrimonio']);
        $data_atual = date("Y-m-d");
        

        // SQL para inserção no banco
        $sql = "INSERT INTO `celulares` (`id`, `usuario`, `modelo`, `armazenamento`, `ram`, `centro-de-custo`, `imei`, `mac-address`, `tipo`, `conta`, `tel`, `situacao`, `data_atual`, `patrimonio`) 
                VALUES ('$id', '$usuario', '$modelo', '$armazenamento', '$ram', '$centrodecusto', '$imei', '$mac', '$tipo', '$conta', '$num', '$situacao', '$data_atual', '$patrimonio');";

        // Executa o SQL e verifica o sucesso
        if ($conexao->query($sql) === TRUE) {
            print "<script>alert('Cadastro realizado com sucesso!');</script>";
            print "<script>location.href='lista_celulares.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexao->error;
        }
        // Fecha a conexão
        $conexao->close();
        
    }

    // VALIDAÇÃO FORMULÁRIO DA PÁGINA edit_manutencao
    if (isset($_POST['valida_edicao'])){    
        $url = $conexao->real_escape_string($_POST['userid']);
        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $modelo = $conexao->real_escape_string($_POST['modelo']);
        $armaz = $conexao->real_escape_string($_POST['armaz']);
        $ram = $conexao->real_escape_string($_POST['ram']);
        $centrodecusto = $conexao->real_escape_string($_POST['centro-c']);
        $imei = $conexao->real_escape_string($_POST['imei']);
        $mac = $conexao->real_escape_string($_POST['mac']);
        $conta = $conexao->real_escape_string($_POST['conta']);
        $tel = $conexao->real_escape_string($_POST['tel']);
        $guarda = $conexao->real_escape_string($_POST['id']); //pega o id atual que foi inserido na url, para conseguir fazer o update sem repetir o id
        $sql = "UPDATE `celulares` SET `id` = '$guarda', `usuario` = '$usuario', `modelo` = '$modelo', `armazenamento` = '$armaz', `ram` = '$ram', `centro-de-custo` = '$centrodecusto', `imei` = '$imei', `mac-address` = '$mac', `conta` = '$conta', `tel` = '$tel'  WHERE `celulares`.`id` = $url;";

        if($conexao->query($sql) == TRUE){
            print "<script>alert('Edição feita com sucesso!');</script>";
            print "<script>location.href='ficha_tecnica.php?userId=$url';</script>";
        }
        else{
            echo("<h5 class='alert alert-danger'>Não foi possível editar o cadastro</h5>");
        }

        $conexao->close();
    }

     // PROCESSA O FORMULÁRIO DE CADASTRO DA MANUTENÇÃO
     if (isset($_POST['valida_nova_manutencao'])) {
        $url = $conexao->real_escape_string($_POST['id']);
        $usuario_man = $conexao->real_escape_string($_POST['usuario_manutencao']);
        $data = $conexao->real_escape_string($_POST['data']);
        $data_formatada = new DateTime($data);
        $data_teste = $data_formatada->format('d-m-Y');
        $tipo = $conexao->real_escape_string($_POST['escolha']);
        $desc = $conexao->real_escape_string($_POST['descricao']);

        $sql = "INSERT INTO `manutencao` (`id`,`num`, `usuario`, `data`, `tipo`, `descricao`) 
                VALUES ('$url','NULL', '$usuario_man', '$data_teste', '$tipo', '$desc');";
        
        if ($conexao->query($sql) === TRUE) {
            print "<script>alert('Manutenção realizada com sucesso!');</script>";
            print "<script>location.href='manutencao.php?userId=$url';</script>";
        } else {
            echo("<div class='alert alert-danger text-center mt-4'>Falha ao realizar cadastro.</div>");
        }
        $conexao->close();
    }
    
?>