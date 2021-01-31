<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php ";

//Определяем на какую страницу зашли
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}
//Стандратные параметры, которые есть на всех страницах
$params = [
    'count' => 2,
    'menuList' => getMenu($arrayMenu)
];
//Определение пула параметров зависящего от страницы
switch ($page) {
    case 'index':
        $params['name'] = 'Valera';
        break;
    case 'catalog':
        $params['catalog'] = getCatalog();
        break;
    case 'about':
        $params['about'] = 'Страница О компании';
        break;
    case 'gallery':
        $params['gallery'] = getGallery();
        $params['currentStatus'] = getStatus();
        break;
}

echo render($page, $params);

