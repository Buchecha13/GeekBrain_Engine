<?php
session_start();
include_once dirname($_SERVER['DOCUMENT_ROOT']) . "/config/config.php ";

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

//Определяем на какую страницу зашли
if ($urlArray[1] == '') {
    $page = 'index';
} else {
    $page = $urlArray[1];
}
$action = $urlArray[2];

$params = prepareVariables($page, $action);

echo render($page, $params);