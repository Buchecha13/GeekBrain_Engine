<?php if (getUser() == 'admin'): ?>
    <h1>Заказы пользователей</h1>
    <div >
        <table class="orders">
            <tr>
                <td>Номер заказа</td>
                <td>Дата заказа</td>
                <td>Имя заказчика</td>
                <td>Телефон</td>
                <td>Статус</td>
                <td>-</td>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td><?= $order['name'] ?></td>
                    <td><?= $order['phone'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><a href="/admin_order/?id=<?= $order['id'] ?>">Детали заказа</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php else: ?>
    <h1>У вас нет доступа к этой странице!</h1>
<?php endif; ?>