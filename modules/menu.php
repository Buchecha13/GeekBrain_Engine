<?php


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