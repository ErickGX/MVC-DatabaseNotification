<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Comunica Senac</a>
        <a class="navbar-brand" href="/notification-center">Centro de notificação</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Codigo do botao de sino com dropdown dinanimco aqui -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown">
                <i class="bi bi-bell-fill" style="font-size: 2rem;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
           <?php 
                echo '<ul class="dropdown-menu dropdown-menu-end" id="notification-list" aria-labelledby="notificationDropdown">'; ?>
               <?php foreach ($arrayNormal as $notificacao) {
                if ($notificacao['mensagem_vista'] == false) { // Só mostra a notificação se ela ainda não foi lida

                    echo '<form action="/update-notification" method="POST">';
                    echo '<input type="hidden" name="id" value="' . $notificacao['id'] . '">';
                    echo '<button type="submit" disable>' . $notificacao['mensagem'] . '</button>';

                    echo '</form>';
                    echo '</li>';

                    
                }
                }
                echo '</ul>';
             ?>
        </div>


    </div>
</nav>