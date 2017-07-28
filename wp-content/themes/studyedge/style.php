<?php

header("Content-Type: text/css");

define('NO_WP', true);
require('../../../wp-config.php');

if(!defined('IMAGE_DIR')) define('IMAGE_DIR', 'images/');

$total = str_replace("'images/", "'" . IMAGE_DIR, file_get_contents('style.css'));

echo $total;

?>