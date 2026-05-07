<?php
session_start();
include "../conexao/conexao.php";

$usuario = trim($_POST['usuario'] ?? '');
$senha   = trim($_POST['senha'] ?? '');

if (empty($usuario) || empty($senha)) {
    $_SESSION['erro'] = "Preencha todos os campos.";
    header("Location: login.php");
    exit;
}

$stmt = $conexao->prepare("SELECT id, usuario, senha FROM users WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $row = $resultado->fetch_assoc();

    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];

        header("Location: lista_celulares.php");
        exit;
    }
}

$_SESSION['erro'] = "Usuário ou senha inválidos.";
header("Location: login.php");
exit;