<?php 
include_once __DIR__ . "/templates/header.php" ;
?>

<div class="container-xl">
    <h1 class="mb-4">Realizar Orçamento</h1>
    <form method="POST" action="../oficina/funcionalidades/cadastroOrcamento.php">
        
        <button type="button" id="orcamento" class="btn btn-primary btn-lg">Cadastrar</button>
        
        <table id="tabela-orcamento" class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        </table>
        
    </form>
</div>

<script type="text/javascript">
  $(document).ready(function(){
        $('#orcamento').on('click', function(){
            // Use Ajax para carregar a página de cadastro_orcamento.php
            $.ajax({
                url: 'funcionalidades/orcamento/views/index.php',
                type: 'GET',
                success: function(response) {
                    // Atualize o conteúdo da div principal com o conteúdo carregado
                    $('.container-xl').html(response);
                },
                error: function(error) {
                    console.log('Erro ao carregar a página de cadastro_orcamento.php:', error);
                }
            });
        });
    });
</script>
<?php include_once "templates/footer.php" ?>
