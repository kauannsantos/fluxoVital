<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: doador.php');
    exit;
}

include __DIR__ . '/../../config/db.php';

function limpar($valor) {
    return trim(htmlspecialchars($valor));
}

$nome = limpar($_POST['nome'] ?? '');
$email = limpar($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$tipo_sanguineo = limpar($_POST['tipo_sanguineo'] ?? '');
$telefone = limpar($_POST['telefone'] ?? '');

if (empty($nome) || empty($email) || empty($senha) || empty($data_nascimento) || empty($tipo_sanguineo) || empty($telefone)) {
    $_SESSION['erro'] = "Preencha todos os campos obrigatórios.";
    header('Location: doador.php');
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {

    $check = $conn->prepare("SELECT id FROM doadores WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['erro'] = "E-mail já cadastrado.";
        header('Location: doador.php');
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO doadores (nome, email, senha, data_nascimento, tipo_sanguineo, telefone) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $email, $senhaHash, $data_nascimento, $tipo_sanguineo, $telefone);
    $stmt->execute();

    header("Location: sucesso.php"); // Você pode criar essa página
    exit;

} catch (Exception $e) {
    error_log("Erro no cadastro: " . $e->getMessage());
    $_SESSION['erro'] = "Erro ao cadastrar. Tente novamente mais tarde.";
    header("Location: doador.php");
    exit;
}

