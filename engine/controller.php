<?php

function prepareVariables($page, $action)
{
    $count = getCartCount();
    $arrayMenu = [
        [
            'title' => 'Главная',
            'href' => '/',
        ],
        [
            'title' => "Каталог",
            'href' => '/catalog',

        ],
        [
            'title' => 'О компании',
            'href' => '/about',
        ],
        [
            'title' => 'Галерея',
            'href' => '/gallery',
        ],
        [
            'title' => 'Отзывы',
            'href' => '/feedbacks',
        ],
        [
            'title' => 'Новости',
            'href' => '/news',
        ],
        [
            'title' => "Корзина($count)",
            'href' => '/cart',
        ]
    ];
    //Стандратные параметры, которые есть на всех страницах
    $params = [
        'menuList' => getMenu($arrayMenu)
    ];

//Определение пула параметров зависящего от страницы
    switch ($page) {
        case 'index':
            $params['name'] = 'Клиент';
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

        case 'feedbacks':

            doFeedbackAction($params, $action);
            $params['feedbacks'] = getFeedbacks();
            $params['message'] = getFeedbackStatus();

            break;

        case 'catalog':
            doCatalogAction($action);
            $params['status'] = $action;
            $params['products'] = getCatalog();
            break;
        case 'product':
            doProductAction($action);
            $name = $_GET['name'];
            $params['product'] = getProduct($name);
            break;
        case 'cart':
            doCartAction($action);
            $params['cart'] = getCart();
            $params['status'] = getCartStatus();
            $params['totalPrice'] = getTotalPrice();
            $productId = $_GET['id'];
            break;
    }

    return $params;
}
