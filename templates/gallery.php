<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <form method="post" enctype="multipart/form-data">
        <label for="upload-photo" class="submit"> Выбрать фото </label>
        <input id="upload-photo" type="file" name="uploadedImage">
        <input type="submit" value="Загрузить">
    </form>
    <p><?= $currentStatus ?></p>
    <div class="gallery">
        <?php foreach ($gallery as $item): ?>
        <div class="img">
            <a class="photo" rel="gallery" href="/image/<?= $item['id'] ?>"><img alt="img-1" src="/gallery_img/small/<?= $item['name'] ?>" width="150" height="100"/></a><br>
            <b>(<?=$item['views']?>)</b>
        </div>

        <?php endforeach; ?>
    </div>

</div>