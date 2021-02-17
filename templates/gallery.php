<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <form method="post" enctype="multipart/form-data">
        <label for="upload-photo" class="submit"> Выбрать фото </label>
        <input id="upload-photo" type="file" name="uploadedImage">
        <input class="send-btn" type="submit" value="Загрузить">
    </form>
    <p><?= $currentStatus ?></p>
    <div class="gallery">
        <?php foreach ($gallery as $item): ?>
            <div class="gallery__img">
                <a class="photo" rel="gallery" href="/image/<?= $item['id'] ?>">
                    <img alt="img-1" src="/gallery_img/small/<?= $item['name'] ?>" width="150" height="100"/>
                </a>
                <br>
                <b style="color: #818181">Views: <?= $item['views'] ?></b>
            </div>

        <?php endforeach; ?>
    </div>

</div>