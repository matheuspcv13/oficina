<?php 
include_once('header.php');
?>

<div class="container-xl">
    <h2 class="mb-4 text-success">Cadastro realizado com sucesso!</h2>

    <div class="btn-container">
        <a href="../index.php" class="btn btn-primary mr-2">Voltar à Tela Inicial</a>

        <a href="orcamento.php?id_cliente=<?php echo $id_cliente; ?>" class="btn btn-success">Fazer Orçamento</a>
    </div>
</div>

<?php 
include_once('templates/footer.php');
?>