<?php 

    session_start();

    if(!isset($_SESSION['usuario_id'])) {

        $teste = $_SESSION['mensagem'] = 'Necessário estar logado para acessar a página';

        header('location:login.php');
        
    }


?>