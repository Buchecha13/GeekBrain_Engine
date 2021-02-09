<?php

define('TEMPLATES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB Config */
define('HOST', 'localhost');
define('USER', 'admin_bv');
define('PASS', '123123');
define('DB', 'engine');
define('ROOT_DIR', dirname($_SERVER['DOCUMENT_ROOT']));


include ROOT_DIR . '/modules/db.php';
include ROOT_DIR . '/modules/functions.php';
include ROOT_DIR . '/modules/catalog.php';
include ROOT_DIR . '/modules/gallery.php';
include ROOT_DIR . '/modules/news.php';
include ROOT_DIR . '/modules/log.php';
include ROOT_DIR . '/modules/menu.php';
include ROOT_DIR . '/modules/uploadImage.php';

