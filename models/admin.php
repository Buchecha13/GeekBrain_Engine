<?php

function getOrders()
{
    $sql = "SELECT * FROM orders";
    $result = getAssocResult($sql);

    for ($i = 0; $i < count($result); $i++) {
        if ($result[$i]['status'] == 'in_processing') {
            $result[$i]['status'] = 'В обработке';
        } elseif ($result[$i]['status'] == 'processed') {
            $result[$i]['status'] = 'Обработан';
        } else {
            $result[$i]['status'] = 'Выполнен';
        }
    }

    return $result;
}

function getOrder()
{
    $orderId = (int)$_GET['id'];
    $sql = "SELECT * FROM orders WHERE id = '{$orderId}'";

    $result = getAssocResult($sql)[0];
    if ($result['status'] == 'in_processing') {
        $result['status'] = 'В обработке';
    } elseif ($result['status'] == 'processed') {
        $result['status'] = 'Обработан';
    } else {
        $result['status'] = 'Выполнен';
    }

    return $result;
}

function getOrderDetail($sessionId)
{
    $sql = "SELECT product_name, product_price FROM cart WHERE session_id = '{$sessionId}'";
    $result = getAssocResult($sql);

    return $result;
}

function changeOrderStatus($orderId)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['orderStatusForm'])) {
        $orderStatus = $_POST['orderStatus'];
        $sql = "UPDATE orders SET status='{$orderStatus}' WHERE id = '{$orderId}'";
        executeSql($sql);
        header("Location: /admin_order/?orderStatusChanged&id=" . $_GET['id']);
    }


}