<?php
//Главный рендер шаблона
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

// Внутренний рендер подшаблона
function renderTemplate($page, $params = [])
{
    ob_start();
    extract($params);
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }
    return ob_get_clean();
}

function getCatalog()
{
    $catalog = [
        [
            'name' => 'Пицца',
            'price' => 15
        ],
        [
            'name' => 'Молоко',
            'price' => 5
        ],
        [
            'name' => 'Чай',
            'price' => 3
        ],
        [
            'name' => 'Конфеты',
            'price' => 9
        ],
        [
            'name' => 'Вода',
            'price' => 1
        ],
    ];
    return $catalog;
}

$arrayMenu = [
    [
        'title' => 'Главная',
        'href' => '/',
        'color' => 'red'
    ],
    [
        'title' => 'Каталог',
        'href' => '/?page=catalog',
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
        'href' => '/?page=about',
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


