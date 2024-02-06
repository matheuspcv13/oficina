<h1 class="mb-4">Cadastrar Orcamento</h1>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="autocompleteCliente" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" name="autocompleteCliente" id="autocompleteCliente" placeholder="Digite o nome completo" required>
            <input type="hidden" id="clienteId" name="clienteId" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="( ) _____-____" required>
        </div>
    </div>
</div>
<button type="submit" id="submit" class="btn btn-primary btn-lg">Enviar</button>

<script>
    $(document).ready(function () {
        $("#autocompleteCliente").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "funcionalidades/orcamento/buscarClientes.php",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            minLength: 2, // Número mínimo de caracteres para acionar a busca
            select: function (event, ui) {
                $("#clienteId").val(ui.item.id);
            }
        });
    });
</script>
