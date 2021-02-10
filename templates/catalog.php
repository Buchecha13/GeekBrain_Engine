<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<h1>Каталог</h1>

<div class="products">
    <?php foreach ($products as $product): ?>
        <div class="products__item">
            <h3><a href="/product/<?=$product['name']?>"><?= $product['name'] ?></a></h3>
            <img height="300px" src="<?= PRODUCT_IMG . $product['image'] ?>" alt="<?= $product['image'] ?>">
            <p>Цена: <span><?=$product['price']?></span> рублей </p>
            <button>Купить</button>
        </div>
    <?php endforeach; ?>
</div>


</body>
</html>