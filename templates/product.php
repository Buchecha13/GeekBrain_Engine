<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="product">
    <h3><?= $product['name'] ?></h3>
    <img height="300px" src="/products_images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    <p>Цена: <span><?= $product['price'] ?></span> рублей </p>
    <button>Купить</button>
    <p><?= $product['descr'] ?></p>

</div>
</body>
</html>