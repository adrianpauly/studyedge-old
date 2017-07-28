<pre><?php

$get_experts = mysql_query("SELECT ID, post_title FROM wp_posts WHERE post_title LIKE 'Expert%' AND post_status != 'inherit' AND post_status != 'draft' AND post_status != 'trash' ORDER BY post_title ASC");
while ($expert = mysql_fetch_object($get_experts)) {
	echo "$expert->post_title = $expert->ID\n";
}

?></pre>