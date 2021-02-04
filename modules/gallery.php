<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/../modules/classSimpleImage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../modules/db.php';



function getGallery() {
//    if (!empty(scandir('gallery_img/small/'))) {
//        $images = scandir('gallery_img/small/');
//        $images = array_splice($images, 2);
//    }
    return getAssocResult("SELECT * FROM `gallery` ORDER BY `views` DESC");

}

function getOneFile(int $id) {
    return getAssocResult("SELECT * FROM `gallery` WHERE `id` = {$id}")[0];
}

function updateViews(int $id) {
    return mysqli_query(getDb(), "UPDATE `gallery` SET `views`=`views`+1 WHERE `id`={$id}");
}


