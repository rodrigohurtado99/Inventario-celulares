<?php
include("../conexao/conexao.php");
include('prot_login.php');


// Obter o termo de busca do parâmetro 'term'
$term = isset($_GET['term']) ? $_GET['term'] : '';

// Consultar o banco de dados
$query = "SELECT id, usuario FROM celulares WHERE usuario LIKE '%$term%' OR id LIKE '%$term%' LIMIT 5";
$result = $conexao->query($query);

// Preparar a resposta
$response = array();
while ($row = $result->fetch_assoc()) {
    $response[] = array(
        'label' => $row['id'] . ' - ' . $row['usuario'], // Mostrar ID e nome
        'value' => $row['usuario'], // Nome do usuário
        'id' => $row['id'] // ID do usuário
    );
}

// Retornar a resposta como JSON
echo json_encode($response);

$conexao->close();
?>