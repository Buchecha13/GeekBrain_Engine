<?php
function uploadImage(){
    $currentStatus = '';
    $allowedTypes = [
        'image/jpg',
        'image/jpeg',
        'image/png',
    ];
    $statuses = [
        'ok' => 'Файл загружен',
        'typeErr' => 'Неверный формат файла',
        'sizeErr' => 'Максимальный размер файла - 5 Мб'
    ];
    $path = $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/big/' . $_FILES['uploadedImage']['name'];
    if (!empty($_FILES)) {
        if (!in_array($_FILES['uploadedImage']['type'], $allowedTypes)) {
            header("Location: /gallery/?status=typeErr");
        } elseif ($_FILES['uploadedImage']['size'] > 1024 * 1024 * 5) {
            header("Location: /gallery/?status=sizeErr");
        } elseif (move_uploaded_file($_FILES['uploadedImage']['tmp_name'], $path)) {
            mysqli_query(getDb(), "INSERT INTO `gallery`(`name`, `file_size`) VALUES ('{$_FILES['uploadedImage']['name']}',{$_FILES['uploadedImage']['size']})");
            $image = new SimpleImage();
            $image->load($path);
            $image->resizeToWidth(250);
            $image->save('gallery_img/small/' . $_FILES['uploadedImage']['name']);
            header("Location: /gallery/?status=ok");
        }
    }

    $currentStatus = $statuses[$_GET['status']];
    return $currentStatus;
}
