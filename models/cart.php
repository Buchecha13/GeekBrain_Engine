<?php

function getCart()
{
    $sessionId = session_id();
    $sql = "SELECT cart.id, cart.product_name, products.image, products.price FROM `cart`, `products` WHERE `cart`.`product_name` = `products`.`name` AND `session_id` = '{$sessionId}'";
    return getAssocResult($sql);
}

function getCartStatus()
{

    $statuses = [
        'cartEmpty' => 'Корзина пуста',
        'order' => 'Заказ оформлен, ожидайте звонка!'
    ];
    if ($_GET['message'] == 'order') {
        $message = $statuses['order'];
    } elseif (empty(getCart())) {
        $_GET['message'] = $statuses['cartEmpty'];
        $message = $statuses['cartEmpty'];
    }

    return $message;
}

function deleteFromCart()
{

    $productId = (int)$_GET['id'];
    $sessionId = session_id();
    $sql = "DELETE FROM `cart` WHERE `cart`.`id` = '{$productId}' AND `session_id` = '{$sessionId}'";
    executeSql($sql);

    header("Location: /cart");
    exit();
}

function doCartAction($action)
{
    if ($action == 'delete') {
        deleteFromCart();
    }
}

function getCartCount()
{
    $sessionId = session_id();
    $sql = "SELECT count(`id`) as count FROM `cart` WHERE `session_id` = '{$sessionId}'";
    return getAssocResult($sql)[0]['count'];
}

function getTotalPrice()
{
    $sessionId = session_id();
    $sql = "SELECT SUM(products.price) as totalPrice FROM cart, products WHERE `cart`.`product_name` = `products`.`name` AND `session_id` = '{$sessionId}'";
    return getAssocResult($sql)[0]['totalPrice'];
}

function createOrder()
{
    $sessionId = session_id();
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));;
    $phone = strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $_POST['phone'])));
    $sql = "INSERT INTO orders (`name`, `phone`, `session_id`) VALUES ('{$name}', '{$phone}', '{$sessionId}')";
    session_regenerate_id();
    executeSql($sql);

    header("Location: /cart/?message=order");
    exit();
}