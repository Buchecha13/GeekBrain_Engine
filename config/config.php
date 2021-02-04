<?php

define('TEMPLATES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB Config */
define('HOST', 'localhost');
define('USER', 'admin_bv');
define('PASS', '123123');
define('DB', 'engine');


include $_SERVER['DOCUMENT_ROOT'] . '/../modules/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/catalog.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/gallery.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/news.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/log.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../modules/uploadImage.php';

