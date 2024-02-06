<?php
include_once __DIR__ . "/../config/connection.php";

$nome = $_POST['nomeCliente'];
$telefone = $_POST['phone'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];
$modeloVeiculo = $_POST['modeloCarro'];
$marca = $_POST['marcaCarro'];
$ano = $_POST['anoCarro'];

$data_format = DateTime::createFromFormat('d/m/Y', $data_nasc);
$data_format = $data_format->format('Y-m-d');


$sql = "INSERT INTO clientes (nome, telefone, cpf, data_nasc) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $telefone, $cpf, $data_format);

if ($stmt->execute()) {
    $clienteId = $stmt->insert_id;

    $sqlVeiculo = "INSERT INTO veiculos (id_cliente_veiculo, modelo, marca, ano) VALUES (?, ?, ?, ?)";
    
    $stmtVeiculo = $conn->prepare($sqlVeiculo);

    $stmtVeiculo->bind_param("isss", $clienteId, $modeloVeiculo, $marca, $ano);

    if ($stmtVeiculo->execute()) {
        include_once "../templates/succes.php";
    } else {
        echo "Erro ao cadastrar veículo: " . $stmtVeiculo->error;
    }
} else {
    echo "Erro ao executar a consulta do cliente: " . $stmt->error;
}

// Fecha as conexões
$stmt->close();
$stmtVeiculo->close();
$conn->close();
?>
