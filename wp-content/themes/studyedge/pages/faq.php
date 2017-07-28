<?php
display_page('Frequently Asked Questions');
/*
?>
<div class="wrap full">
	<div class="big-image short">
		<div class="overlay">
			<div class="wrap">
				<h1>Frequently Asked Questions</h1>
				<h3>Have a question? Find the answer here, call us at <a href="tel:1-888-97-78839">1-888-97-STUDY</a>, or email <a href="mailto:help@studyedge.com">help@studyedge.com</a>.</h3>
			</div>
		</div>
	</div>
</div>
<div class="wrap accordion">
	<div class="hidden"></div>
	<?php
	$get_posts = mysql_query(
			$q="SELECT post_title, post_content
				FROM wp_posts p
				LEFT OUTER JOIN wp_term_relationships r ON r.object_id = p.ID
				LEFT OUTER JOIN wp_terms t ON t.term_id = r.term_taxonomy_id
				WHERE p.post_status = 'publish' AND p.post_type = 'post' AND t.slug = 'faq'
				ORDER BY p.ID ASC");
	while ($post = mysql_fetch_object($get_posts)) {
		echo '<div><b></b><h2>' . $post->post_title . '</h2>' . $post->post_content . '</div>';
	}
	$post = mysql_fetch_object($get_posts);
	print_r($post);
	?>
</div>
<div class="half space"></div>
*/?>