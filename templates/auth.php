<?php if ($isAuth): ?>
    <p>Имя пользователя: <span><?=$name?> | </span>    <a href="/?logout">Выйти</a></p>

<?php else : ?>

    <form class="auth-form" method="post">
        <input hidden name="auth-form">
        <input type="text" name="login" placeholder="Введите логин">
        <input type="password" name="pass" placeholder="Введите пароль">
        <label for="save-user">Запомнить:</label><input id="save-user" class="save-checkbox" type="checkbox" name="save">
        <input type="submit" value="Войти">
    </form>
<?php endif ?>