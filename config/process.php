<?php 

session_start();

include_once('connection.php');
include_once('url.php');

$data = $_POST;

if (!empty($data)){
    if($data['type'] == "insert"){
        
        $nome = $data['nomeCliente'];
        $telefone = $data['phone'];
        $cpf = $data['cpf'];
        $data_nasc = $data['data_nasc'];
        $modeloVeiculo = $data['modeloCarro'];
        $marca = $data['marcaCarro'];
        $ano = $data['anoCarro'];

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
                include_once('templates/succes.php');
            } else {
                echo "Erro ao cadastrar veículo: " . $stmtVeiculo->error;
            }
        } else {
            echo "Erro ao executar a consulta do cliente: " . $stmt->error;
        }
    }else if ($data['type'] == "insertOrcamento"){
        $id = $data['clienteId'];
        $date = $data['data'];
        $desc = $data['descricao'];
        $valor = $data['valor'];

        $data_format = DateTime::createFromFormat('d/m/Y', $date);
        $data_format = $data_format->format('Y-m-d');

        $sql = 'INSERT INTO orcamentos (id_cliente_orcamento, data_orcamento, descricao, valor) VALUES (?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("issi", $id, $date, $desc, $valor);

        if ($stmt->execute()) {
            $response = ["status" => "success", "message" => "Cadastro realizado com sucesso!"];
            echo json_encode($response);
        } else {
            $response = ["status" => "error", "message" => "Erro ao cadastrar: " . $stmt->error];
            echo json_encode($response);
        }        

    } 
}
