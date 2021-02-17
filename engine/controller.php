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
    if (getUser() == 'admin') {
        $arrayMenu [] = [
            'title' => "Админка",
            'href' => '/admin_orders',
        ];
    }

    //Стандратные параметры, которые есть на всех страницах

    $params['isAuth'] = isAuth();
    $params['name'] = getUser();
    $params['menuList'] = getMenu($arrayMenu);

//Определение пула параметров зависящего от страницы
    switch ($page) {
        case 'index':
            break;

        case 'gallery':
            $params['gallery'] = getGallery();
            if (!empty($_FILES)) {
                uploadImage();
            };
            $statuses = [
                'ok' => 'Файл загружен',
                'typeErr' => 'Неверный формат файла',
                'sizeErr' => 'Максимальный размер файла - 5 Мб',
                'emptyFILES' => 'Файл не выбран'
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
            if (isset($_POST['cart-form'])) {
                createOrder();
            }

            doCartAction($action);
            $params['cart'] = getCart();
            $params['message'] = getCartStatus();
            $params['totalPrice'] = getTotalPrice();
            break;

        case 'admin_orders':
            $params['orders'] = getOrders();
            break;

        case 'admin_order':
            $params['order'] = getOrder();
            $params['orderDetail'] = getOrderDetail(getOrder()['session_id']);
            $params['message'] = $_GET['message'];
            changeOrderStatus(getOrder()['id']);
            break;

    }

    return $params;
}
