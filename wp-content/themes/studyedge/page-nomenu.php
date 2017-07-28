<?php
/**
 * Template name: Page w/ no menu
 */

get_header('nomenu');

while ( have_posts() ) : the_post();
	the_content();
endwhile;

get_footer(); ?>