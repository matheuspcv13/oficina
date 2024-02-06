<?php 
include_once __DIR__ . "/templates/header.php" ;
?>

<div class="container-xl">
    <h1 class="mb-4">Cadastrar Cliente</h1>
    <form method="POST" action="../oficina/funcionalidades/cadastroCliente.php">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nomeCliente" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="Digite o nome completo" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="( ) _____-____" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="___.___.___-__">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="data_nasc" class="form-label">Data de Nascimento</label>
                    <input type="text" class="form-control" name="data_nasc" id="data_nasc" placeholder="dd/mm/aaaa">
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="marcaCarro" class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marcaCarro" id="marcaCarro" placeholder="ex: Fiat" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="modeloCarro" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modeloCarro" id="modeloCarro" placeholder="ex: Palio" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="anoCarro" class="form-label">Ano</label>
                    <input type="number" class="form-control" name="anoCarro" id="anoCarro" required>
                </div>
            </div>
        </div>

        <button type="submit" id="submit" class="btn btn-primary btn-lg">Enviar</button>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#phone').mask('(99) 99999-9999');
        $('#cpf').mask('999.999.999-99');
        $('#data_nasc').mask('99/99/9999');
        $('#anoCarro').mask('9999');
        
        $('#submit').click(function (event) {
            var nomeCliente = $('#nomeCliente').val();
            var phone = $('#phone').val();
            var cpf = $('#cpf').val();
            var dataNasc = $('#data_nasc').val();
            var modeloCarro = $('#modeloCarro').val();
            var anoCarro = $('#anoCarro').val();
            var anoCarro = $('#marcaCarro').val();
            
            if (!nomeCliente || !phone || !cpf || !dataNasc || !anoCarro || !anoCarro || !marcaCarro || anoCarro > anoAtual) {
                alert("Preencha todos os campos antes de enviar o formulário.");
                event.preventDefault();
            }
        });
    });
</script>
<?php include_once "templates/footer.php" ?>
