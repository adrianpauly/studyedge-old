<?php
/**
 * Template name: Page w/ help tab
 */

get_header();

while ( have_posts() ) : the_post();
	the_content();
endwhile;

get_template_part('help-tab');

get_footer(); ?>