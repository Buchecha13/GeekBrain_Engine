<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Отзывы</h1>
    <form action="/feedbacks/<?=$action?>" method="post">
        <input hidden type="text" name="id" value="<?= $feedbackId ?>">
        <input type="text" name="name" placeholder="Ваше имя" value="<?= $feedbackName ?>">
        <input type="text" name="feedback" placeholder="Ваш отзыв" value="<?= $feedbackText ?>">
        <input class="send-btn" type="submit" value="<?=$btnText?>">
    </form>

    <div class="feedbacks">
        <p style="color: #c80000"><?= $message ?></p>
        <?php foreach ($feedbacks as $item) : ?>
            <p><b>Отзыв от:</b> <?= $item['name'] ?></p>
            <p><b>Текст отзыва:</b> <?= $item['feedback'] ?></p>
            <a href="/feedbacks/edit/<?= $item['id'] ?>">Модерировать отзыв</a>
            <span>|</span>
            <a href="/feedbacks/delete/<?= $item['id'] ?>">Удалить отзыв</a><br>
        <?php endforeach; ?>
    </div>
</body>
</html>