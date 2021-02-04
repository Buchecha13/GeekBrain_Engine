<?php
$arrayMenu = [
    [
        'title' => 'Главная',
        'href' => '/',
    ],
    [
        'title' => 'Каталог',
        'href' => '/catalog',
        'subitems' => [
            [
                'title' => 'Для дома',
                'href' => '/catalog/dlya-doma',
                'subitems' => [
                    [
                        'title' => 'Бытовая химия',
                        'href' => '/catalog/dlya-doma/bytovaya-himiya',
                    ],
                    [
                        'title' => 'Посуда',
                        'href' => '/catalog/dlya-doma/posyda',
                    ]
                ]
            ],
            [
                'title' => 'Электоника',
                'href' => '/catalog/elektronika',
            ],
            [
                'title' => 'Аудио и видео',
                'href' => '/catalog/audio-i-video',
            ]
        ]
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
    'title' => 'Новости',
    'href' => '/news',
]
];

function getMenu($arrayMenu)
{


    $menuList = "<ul>";
    foreach ($arrayMenu as $menuItem) {
        $menuList .= "<li><a href=\"{$menuItem['href']}\">{$menuItem['title']}</a>";
        if (isset($menuItem['subitems'])) {
            $menuList .= getMenu($menuItem['subitems']);
        }
        $menuList .= "</li>";
    }
    $menuList .= "</ul>";
    return $menuList;
}