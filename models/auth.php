<?php

if (isset($_GET['logout'])) {
    setcookie("hash","", time() - 1, '/');
    session_destroy();
    header("Location: /");
    exit();
}

if (isset($_POST['auth-form'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (auth($login, $pass)) {
        if (isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $id = $_SESSION['auth']['id'];
            $sql = "UPDATE `users` SET hash = '{$hash}' WHERE id = '{$id}'";
            executeSql($sql);
            setcookie("hash", $hash, time() + 3600, '/');
        }

        header("Location: " . $_SERVER["REQUEST_URI"]);
        exit();
    } else {
        exit('Не верный логин или пароль');
    }
}


function auth($login, $pass)
{

    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $login)));
    $sql = "SELECT * FROM users WHERE login = '{$login}'";
    if (getAssocResult($sql)) {
        $result = getAssocResult($sql)[0];
        if (password_verify($pass, $result['pass'])) {
            $_SESSION['auth']['login'] = $login;
            $_SESSION['auth']['id'] = $result['id'];
            return true;
        }
    }
    return false;
}

function isAuth()
{
    if (isset($_COOKIE['hash']) && !isset($_SESSION['auth']['login'])) {
        $hash = $_COOKIE['hash'];
        $sql = "SELECT * FROM users WHERE hash = '{$hash}'";
        if (getAssocResult($sql)) {
            $result = getAssocResult($sql);
            $user = $result[0]['login'];
            $_SESSION['auth']['login'] = $user;
        }
    }
    return isset($_SESSION['auth']['login']);
}

function getUser()
{
    if ($_SESSION['auth']['login']) {
        $name = $_SESSION['auth']['login'];
        return $name;
    }
    $name = "Гость";
    return $name;
}