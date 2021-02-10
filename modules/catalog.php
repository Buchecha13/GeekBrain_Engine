<?php
function getCatalog()
{
    $sql = "SELECT * FROM `products`";
    return getAssocResult($sql);
}

function getProduct($name)
{
    $sql = "SELECT * FROM `products` WHERE `name`='{$name}'";
    return getAssocResult($sql) [0];
}