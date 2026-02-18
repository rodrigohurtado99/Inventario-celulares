<?php
    session_start();

    include "../conexao/conexao.php";

    if(isset($_SESSION['mensagem'])) { // verifica mensagem na sessão quando é feito a tentativa de entrar em uma página sem ter feito login

        echo $_SESSION['mensagem']; 

        unset($_SESSION['mensagem']); //remove a mensagem

    }
       
       
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){ // Garante que o PHP só execute quando o formulário for enviado
        $usuario = htmlspecialchars($_POST['usuario'] ?? ''); // limpa o campo de espaço e protege contra xss e evita que que de erro ao digitar
        $senha = htmlspecialchars($_POST['senha'] ?? ''); //  limpa o campo de espaço e protege contra xss e evita que que de erro ao digitar
        
        if(empty($usuario) && empty($senha)){// se os dois campos estiverem vazios emite erro
        
            echo "Informe usuário e senha....";

        } elseif(empty($usuario)) {

            echo "Informe o usuário..";

        } 
        
    {
            // busca usuário do banco
            $stmt = $conexao->prepare("SELECT id, usuario, senha from users WHERE usuario = ?"); // prepara o mysql para executar
            $stmt->bind_param('s', $usuario); // insere o valor de espera no prepare limpando antes de mandar pro banco de dados
            $stmt->execute(); // executa o código passado 
            $resultado = $stmt->get_result(); // guarda o resultado
            
            if($resultado->num_rows === 1) {
                $row = $resultado->fetch_assoc();

                // verifica senha
                if(password_verify($senha, $row['senha'])) {

                    // cria sessão
                    $_SESSION['usuario_id'] = $row['id'];
                    $_SESSION['usuario'] = $usuario;


                    header("location: lista_celulares.php");
                    exit;
                } else {

                    echo 'Usuário ou senha inválidos...';
                }
            } 
        }
     
    }

  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div class="container">
        <form method="POST">
            <input type="text" name="usuario" autofocus><br><br>
            <input type="password" name="senha"><br><br>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>

</html>