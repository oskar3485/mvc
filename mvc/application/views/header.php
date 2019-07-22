<div class="session_view">
    <?php
    if(!empty($_SESSION['token'])) {
        echo 'Добро пожаловать' . '<h3>' . $_SESSION['email'] . '</h3>'; ?>
        <div id="exit"><a href="/register/logout" class="btn btn-dark">Выйти</a></div>
    <?php } ?>
</div>
