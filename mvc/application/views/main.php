<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="session_view">
    <?php
    if(!empty($_SESSION['email'])) {
        echo 'Добро пожаловать' . '<h3>' . $_SESSION['email'] . '</h3>'; ?>
        <a href="/register/logout" class="btn btn-dark">Выйти</a>
    <?php } ?>

</div>
<?php  include 'application/views/' . $view_name . '.php';?>

</body>
</html>
