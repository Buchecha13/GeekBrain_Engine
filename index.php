<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

include 'functions/functions.php';
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
    case 'catalog':
        $params['catalog'] = getCatalog();
    case 'about':
        $params['about'] = 'Страница О компании';
}

echo render($page, $params);

