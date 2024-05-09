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

<?php include "assets/navbar-notification.php" ?>
    







<!-- Inclua o JavaScript do Bootstrap 5 e o jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Script para capturar o id da lista com o click na notificacao-->
<script>
    $(document).ready(function() {
  $('#notification-list').on('click', 'li', function(e) {
    e.preventDefault(); // Previne o comportamento padrão do clique

    var notificationId = $(this).data('id');

    $.ajax({
      url: '/update-notification/' + notificationId,
      type: 'PUT',
      success: function(response) {
        // Atualiza a interface do usuário aqui após a notificação ser marcada como lida
      }
    });
  });
});
</script>

</body>



</html>