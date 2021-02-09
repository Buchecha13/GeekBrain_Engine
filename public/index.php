<?php

include_once dirname($_SERVER['DOCUMENT_ROOT']) . "/config/config.php ";

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

//Определяем на какую страницу зашли
if ($urlArray[1] == '') {
    $page = 'index';
} else {
    $page = $urlArray[1];

}

//Стандратные параметры, которые есть на всех страницах
$params = [
    'count' => 2,
    'menuList' => getMenu($arrayMenu)
];
//Определение пула параметров зависящего от страницы
switch ($page) {
    case 'index':
        $params['name'] = 'Клиент';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        $params['gallery'] = getGallery();
        if (!empty($_FILES)) {
            uploadImage();
        }
        $statuses = [
            'ok' => 'Файл загружен',
            'typeErr' => 'Неверный формат файла',
            'sizeErr' => 'Максимальный размер файла - 5 Мб'
        ];
        $params['currentStatus'] = $statuses[$_GET['status']];
        break;

    case 'image':
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        updateViews($id);
        $params['file'] = getOneFile($id);
        break;

    case 'about':
        $params['about'] = 'Страница О компании';
        break;

    case 'news':
        $params['news'] = getNews();
        break;

    case 'onenews':
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        $params['news'] = getOneNews($id);
        break;
}

echo render($page, $params);


