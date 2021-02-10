<?php

define('TEMPLATES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ROOT_DIR', dirname($_SERVER['DOCUMENT_ROOT']));
define('PRODUCT_IMG', 'products_images/');

/* DB Config */
define('HOST', 'localhost');
define('USER', 'admin_bv');
define('PASS', '123123');
define('DB', 'engine');



include ROOT_DIR . '/engine/db.php';
include ROOT_DIR . '/engine/controller.php';
include ROOT_DIR . '/engine/functions.php';
include ROOT_DIR . '/modules/catalog.php';
include ROOT_DIR . '/modules/news.php';
include ROOT_DIR . '/modules/menu.php';
include ROOT_DIR . '/modules/feedbacks.php';
include ROOT_DIR . '/modules/gallery/uploadImage.php';
include ROOT_DIR . '/modules/gallery/gallery.php';




