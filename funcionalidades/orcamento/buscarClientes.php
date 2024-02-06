<?php 
include_once "../../config/connection.php";

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$term = $_GET["term"];

$sql = "SELECT id_cliente, nome, modelo FROM clientes 
INNER JOIN veiculos on id_cliente = id_cliente_veiculo 
WHERE nome LIKE '%$term%'";
$result = $conn->query($sql);

$clientes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = array(
            "id" => $row["id_cliente"],
            "value" => $row["nome"]  ." || " . $row['modelo'],
        );
    }
}

$conn->close();

echo json_encode($clientes);
?>