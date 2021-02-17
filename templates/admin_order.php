<?php if (getUser() == 'admin'): ?>
    <div class="order">
        <h1>Номер заказа: <span style="color: #FFFFFF;"><?= $order['id'] ?></span></h1>
        <h3>Заказчик:<span><?= $order['name'] ?></span></h3>
        <h3>Телефон заказчика:<span><?= $order['phone'] ?></span></h3>
        <h3>Дата заказа:<span><?= $order['order_date'] ?></span></h3>
        <?php if (isset($_GET['orderStatusChanged'])): ?>
        <span style="color: #bc2525">Статус заказа изменен!</span>
        <?php endif; ?>
        <table class="orders">
            <tr>
                <th>Название товара</th>
                <th>Цена (руб)</th>
            </tr>
            <?php foreach ($orderDetail as $value): ?>
                <tr>
                    <td><?=$value['product_name']?></td>
                    <td><?=$value['product_price']?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3>Статус заказа: <span><?= $order['status'] ?></span></h3>
        <form class="order-status__form" method="post">
            <input hidden name="orderStatusForm">
            <select name="orderStatus">
                <option value="in_processing">В обработке</option>
                <option value="processed">Обработан</option>
                <option value="done">Выполнен</option>
            </select>
            <input type="submit" value="Изменить статус">
        </form>
    </div>
<?php else: ?>
    <h1>У вас нет доступа к этой странице!</h1>
<?php endif; ?>
