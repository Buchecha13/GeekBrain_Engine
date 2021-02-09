<?php

function prepareVariables($page, $action)
{
    $arrayMenu = [
        [
            'title' => 'Главная',
            'href' => '/',
        ],
        [
            'title' => 'Каталог',
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
            'href' => '/feedbacks/add',
        ],
        [
            'title' => 'Новости',
            'href' => '/news',
        ]
    ];
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

        case 'feedbacks':

            if ($action === 'add') {
                $params['feedback'] = [];
                $params['btnText'] = 'Добавить отзыв';
                $params['action'] = 'add';
                addFeedback();
            }
            if ($action === 'edit') {
                $params['feedback'] = editFeedback();
                $params['btnText'] = 'Изменить отзыв';
                $params['action'] = 'update';
            }
            if ($action === 'update') {
                updateFeedback();
                $params['btnText'] = 'Добавить отзыв';
            }
            if ($action === 'delete') {
                deleteFeedback();
                $params['btnText'] = 'Добавить отзыв';
            }
            $params['feedbacks'] = getFeedbacks();
            $params['message'] = getFeedbackStatus();

            break;
    }

    return $params;
}
