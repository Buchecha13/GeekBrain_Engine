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
