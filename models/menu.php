<?php


function getMenu($arrayMenu)
{
    $menuList = "<nav class='cl-effect-14 menu-box'>";
    foreach ($arrayMenu as $menuItem) {
        $menuList .= "<a class='menu-link' href=\"{$menuItem['href']}\">{$menuItem['title']}</a>";
        if (isset($menuItem['subitems'])) {
            $menuList .= getMenu($menuItem['subitems']);
        }
    }
    $menuList .= "</nav>";

    return $menuList;
}
