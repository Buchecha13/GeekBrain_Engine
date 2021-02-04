<h2>Новости</h2>

<?php foreach ($news as $item): ?>

    <div class="news-item">
        <h3><a href="/onenews/<?= $item['id'] ?>"><?= $item['title'] ?></a></h3>
        <p><?= $item['text'] ?></p>

    </div>

<?php endforeach; ?>
