<?php
    
    $user = "root";
    $password = "";
    $database = "inventario_celulares";
    $hostname = "localhost"; 
   
    // reporta erros se houver algum
    $reporta_erro = mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // conexao ao banco de dados
    $conexao = new mysqli($hostname, $user, $password, $database) or die("ERRO na consulta");
?>