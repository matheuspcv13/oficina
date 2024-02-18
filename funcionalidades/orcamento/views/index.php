<form id="cadastroOrcamento" action="config/process.php" method="POST">
    <input type="hidden" name="type" value="insertOrcamento">
    <h1 class="mb-4">Cadastrar Orçamento</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="autocompleteCliente" class="form-label">Nome</label>
                <input type="text" class="form-control" name="autocompleteCliente" id="autocompleteCliente" placeholder="Digite o nome completo" required>
                <input type="hidden" id="clienteId" name="clienteId" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="text" class="form-control" name="data" id="data" placeholder="dd/mm/aaaa" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <textarea class="form-control" name="descricao" id="description" rows="4" required></textarea>
                <label for="descricao" class="form-label">Descrição</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" class="form-control" name="valor" id="valor" required>
            </div>
        </div>
    </div>
    <button type="button" id="submit" class="btn btn-primary btn-lg">Enviar</button>
</form>

<script>
    $(document).ready(function () {

        $('#data').mask('00/00/0000');
        
        $('#valor').mask('000.000.000,00', {reverse: true});
        
        $("#autocompleteCliente").autocomplete({

            source: function (request, response) {
                $.ajax({
                    url: "funcionalidades/orcamento/autoComplete.php",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                $("#clienteId").val(ui.item.id);
            }
        });

        $("#submit").on("click", function () {
        var formData = $("#cadastroForm").serialize();

        $.ajax({
            type: "POST",
            url: "config/process.php",
            data: formData,
            success: function (response) {
                Swal.fire({
                    title: "Orcamento Cadastrado",
                    text: response,
                    icon: "success"
                });

                $("#cadastroForm")[0].reset();
            },
            error: function () {
                alert("Erro ao enviar o formulário.");
            }
        });
    });
    });
</script>
