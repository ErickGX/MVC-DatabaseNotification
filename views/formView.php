<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Avisos Internos</title>

    <link rel="stylesheet" href="assets/style.css">


    <!-- Inclua o CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <?php include "assets/navbar.php" ?>


    <!-- Formulário -->
    <div class="container">
        <h1>Formulário para envio de notificações Senac </h1>
        <form action="/cadastrar" method="post">


            <!-- Caixa de opções para Discente e Docente -->
            <div class="mb-3">
                <label for="roleSelect" class="form-label">Escolha o Destinátario</label>
                <select name="destinatario" class="form-select" id="roleSelect">
                    <option value="docente" selected>Docente</option>
                    <option value="discente">Discente</option>
                </select>
            </div>

            <div class="mb-3" id="turmaSelectDiv">
                <label for="classSelect" class="form-label">Escolha o Destinátario</label>
                <select name="turma" class="form-select" id="classSelect">
                    <option value="" selected>Escolha a turma para enviar o aviso</option>
                    <option value="1MC">1 SEMESTRE MATUTINO TURMA C</option>
                    <option value="2MC">2 SEMESTRE MATUTINO TURMA C</option>
                    <option value="3MC">3 SEMESTRE MATUTINO TURMA C</option>
                    <option value="4MC">4 SEMESTRE MATUTINO TURMA C</option>
                    <option value="5MC">5 SEMESTRE MATUTINO TURMA C</option>

                </select>
            </div>

            <!-- Caixa para a escolha da data -->
            <div class="mb-3">
                <label for="dateInput" class="form-label">Data do aviso</label>
                <input name="date" type="date" class="form-control" id="dateInput">
            </div>

            <div class="mb-3">
                <label for="avisoTypeSelect" class="form-label">Categoria de Aviso</label>
                <select class="form-select" id="avisoTypeSelect" name="tipoaviso">
                    <option value="" selected>Escolha uma opção</option>
                    <option value="instituicional">Institucional</option>
                    <option value="faltaProfessores">Falta de Professores</option>
                    <option value="sem aula">Não haverá aula</option>
                </select>
            </div>

            <!-- Definição do tipo de mensagem -->
            <div class="mb-3">
                <label for="messageTypeSelect" class="form-label">Tipo de mensagem</label>
                <select class="form-select" id="messageTypeSelect">
                    <option selected default value="">Escolha uma opção</option>
                    <option value="manual">Manual</option>
                    <option value="predefinida">Mensagens Pré-definidas</option>
                </select>
            </div>


            <!-- Campo para digitação da mensagem -->
            <div class="mb-3" id="manualMessageDiv">
                <label for="manualMessageInput" class="form-label">Digite a mensagem</label>
                <textarea name="manual" class="form-control" id="manualMessageInput" rows="3"></textarea>
            </div>

            <!-- Campo para a mensagem predefinida -->
            <div class="mb-3" id="predefinedMessageDiv">
                <label for="predefinedMessageSelect" class="form-label">Mensagens Pré-definidas</label>
                <!-- As mensagens predefinidas serão carregadas aqui dinamicamente com JavaScript/jQuery -->
                <select name="predefinida" class="form-select" id="predefinedMessageSelect">
                    <?php foreach ($mensagens as $mensagem): ?>
                        <option value="<?= $mensagem->getTextoMsg() ?>"><?= $mensagem->getTextoMsg() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Caixa para a escolha da via de encaminhamento -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="encaminhamento" value="Site" id="defaultCheck1"
                    checked>
                <label class="form-check-label" for="defaultCheck1">
                    Via de Encaminhamento: BlackBoard
                </label>
            </div>

            <!-- <input name="viaInput" type="text" class="form-control" id="viaInput" value="Site"> -->


            <!-- Botão de envio -->
            <div class="d-flex justify-content-center">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
            </div>


        </form>
    </div>








    <!-- Inclua o JavaScript do Bootstrap 5 e o jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"ntegrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



    <!--Codigos JQuery -->

    <script>
        $(document).ready(function () {
            // Inicialmente, esconde os campos de mensagem
            $('#manualMessageDiv').hide();
            $('#predefinedMessageDiv').hide();

            // Quando o valor do campo de seleção do tipo de mensagem muda...
            $('#messageTypeSelect').change(function () {
                // Obtém o valor selecionado
                var selected = $(this).val();

                if (selected == 'manual') {
                    // Se 'manual' foi selecionado, mostra o campo de mensagem manual e esconde o campo de mensagem predefinida
                    $('#manualMessageDiv').show();
                    $('#predefinedMessageDiv').hide();
                } else if (selected == 'predefinida') {
                    // Se 'predefinida' foi selecionado, mostra o campo de mensagem predefinida e esconde o campo de mensagem manual
                    $('#predefinedMessageDiv').show();
                    $('#manualMessageDiv').hide();
                } else {
                    // Se nenhum foi selecionado, esconde ambos os campos de mensagem
                    $('#manualMessageDiv').hide();
                    $('#predefinedMessageDiv').hide();
                }
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            // Inicialmente, esconde os campos de mensagem
            $('#turmaSelectDiv').hide();

            // Quando o valor do campo de seleção do tipo de mensagem muda...
            $('#roleSelect').change(function () {
                // Obtém o valor selecionado
                var selected = $(this).val();

                if (selected == 'discente') {
                    // Se 'manual' foi selecionado, mostra o campo de mensagem manual e esconde o campo de mensagem predefinida
                    $('#turmaSelectDiv').show();
                } else if (selected == 'docente') {
                    // Se 'predefinida' foi selecionado, mostra o campo de mensagem predefinida e esconde o campo de mensagem manual
                    $('#turmaSelectDiv').hide();
                } else {
                    // Se nenhum foi selecionado, esconde ambos os campos de mensagem
                    $('#turmaSelectDiv').hide();
                }
            });
        });

    </script>


</body>



</html>