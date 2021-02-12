<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Интернет магазин</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="/css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="/css/component.css"/>
    <script src="/scripts/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
    <?php if ($auth): ?>
    <p>Добро пожаловать, <span><?=$name?></span></p>
    <?php else : ?>
    <form class="auth-form" method="post">
        <input type="text" name="name" placeholder="Введите логин">
        <input type="password" name="pass" placeholder="Введите пароль">
        <input type="submit" value="Войти">
    </form>
    <?php endif ?>

    <?= $menu ?>
    <?= $content ?>
</div>

</body>
</html>