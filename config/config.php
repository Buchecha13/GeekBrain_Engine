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
include ROOT_DIR . '/models/auth.php';
include ROOT_DIR . '/models/catalog.php';
include ROOT_DIR . '/models/product.php';
include ROOT_DIR . '/models/cart.php';
include ROOT_DIR . '/models/news.php';
include ROOT_DIR . '/models/menu.php';
include ROOT_DIR . '/models/feedbacks.php';
include ROOT_DIR . '/models/admin.php';
include ROOT_DIR . '/models/gallery/uploadImage.php';
include ROOT_DIR . '/models/gallery/gallery.php';




