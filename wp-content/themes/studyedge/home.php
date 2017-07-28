<?php
/**
 * @package WordPress
 * @subpackage Study Edge
 * @since Study Edge 1.0
 */

get_header();
require('pages/' . $_GET['p'] . '.php');
get_footer();

?>