<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<h1>Каталог</h1>

<table cellpadding="2" cellspacing="2" border="1">
    <tr>
        <td>
            <b>Товар</b>
        </td>
        <td>
            <b>Цена (в рублях)</b>
        </td>
    </tr>
    <?foreach ($catalog as $product): ?>
    <tr>
        <td><?=$product['name']?></td>
        <td><?=$product['price']?></td>
    </tr>
    <?endforeach;?>
</table>
</body>
</html>