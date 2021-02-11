<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="cart">
    <?php if ($status == false): ?>
        <p>Корзина пуста</p>
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
    <?php endif; ?>
</div>
</body>
</html>