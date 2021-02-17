<div class="cart">
    <?php if (isset($_GET['message'])): ?>
        <p><?=$message?></p>
    <?php else : ?>
    <div class="total-price">
        <h3>Общая сумма покупки: <span style="font-weight: normal"><?=$totalPrice?></span> рублей</h3>
    </div>
        <?php foreach ($cart as $cartItem): ?>
            <div class="cart__product">
                <h3><a href="/product/?name=<?= $cartItem['product_name'] ?>"><?= $cartItem['product_name'] ?></a></h3>
                <img height="100px" src="/<?= PRODUCT_IMG . $cartItem['image'] ?>" alt="<?= $cartItem['image'] ?>">
                <p>Цена: <span><?= $cartItem['price'] ?></span> рублей </p>
                <a href="/cart/delete/?id=<?= $cartItem['id'] ?>">Удалить из корзины</a>
            </div>
            <hr>
        <?php endforeach; ?>
    <form method="post" class="cart-form">
        <input hidden name="cart-form">
        <input name="name" type="text" placeholder="Ваше имя">
        <input name="phone" type="text" placeholder="Ваш номер телефона">
        <input type="submit" value="Заказать">
    </form>
    <?php endif; ?>
</div>