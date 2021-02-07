<?php

define('TEMPLATES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB Config */
define('HOST', 'localhost');
define('USER', 'admin_bv');
define('PASS', '123123');
define('DB', 'engine');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);


include dirname(ROOT_DIR) . '/modules/db.php';
include dirname(ROOT_DIR) . '/modules/functions.php';
include dirname(ROOT_DIR) . '/modules/catalog.php';
include dirname(ROOT_DIR) . '/modules/gallery.php';
include dirname(ROOT_DIR) . '/modules/news.php';
include dirname(ROOT_DIR) . '/modules/log.php';
include dirname(ROOT_DIR) . '/modules/menu.php';
include dirname(ROOT_DIR) . '/modules/uploadImage.php';

