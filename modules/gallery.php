<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/../modules/classSimpleImage.php';




function getGallery() {
    if (!empty(scandir('gallery_img/small/'))) {
        $images = scandir('gallery_img/small/');
        $images = array_splice($images, 2);
    }
    return $images;

}

function getStatus(){
    $allowed_types = [
        'image/jpg',
        'image/jpeg',
        'image/png',
    ];
    $status = [
        'ok' => 'Файл загружен',
        'typeErr' => 'Неверный формат файла',
        'sizeErr' => 'Максимальный размер файла - 5 Мб'
    ];
    $path = $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/big/' . $_FILES['uploadedImage']['name'];
    if (!empty($_FILES)) {
        if (!in_array($_FILES['uploadedImage']['type'], $allowed_types)) {
            header("Location: index.php?page=gallery&status=typeErr");
        } elseif ($_FILES['uploadedImage']['size'] > 1024 * 1024 * 5) {
            header("Location: index.php?page=gallery&status=sizeErr");
        } elseif (move_uploaded_file($_FILES['uploadedImage']['tmp_name'], $path)) {

            $image = new SimpleImage();
            $image->load($path);
            $image->resizeToWidth(250);
            $image->save('gallery_img/small/' . $_FILES['uploadedImage']['name']);
            header("Location: index.php?page=gallery&status=ok");
        }
    }

    $currentStatus = $status[$_GET['status']];
    return $currentStatus;
}
