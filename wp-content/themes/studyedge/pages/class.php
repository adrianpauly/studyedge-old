<?php
$replace = array(
	'{SCHOOL_ID}' => SCHOOL_ID,
);
$options = array('code', 'name', 'subject_id', 'experts', 'services');
$class = get_object(intval($_GET['class']), $options);
foreach ($class as $key => $value) {
	$replace['{' . strtoupper($key) . '}'] = $value;
}

foreach ($options as $key) {
	if (!isset($replace[$k = '{' . strtoupper($key) . '}'])) $replace[$k] = '';
}

$expert_ids = explode(',', preg_replace('/[^\d,]/', '', $class['experts']));
$experts = get_objects($expert_ids, array('name', 'education', 'expertise', 'fact', 'email', 'video_url', 'body_image'), 'id');
$exp_text = '';
foreach($expert_ids as $id) {
	if (!isset($experts[$id])) continue;
	$expert = $experts[$id];
	$exp_text .= '
	<div class="bio">
		<div class="col-55">
			<h4>' . $expert['name'] . '</h4>
			<b>Education:</b> ' . $expert['education'] . '<br />
			<b>Study Expert in:</b> ' . $expert['expertise'] . '<br />
			<b>Fun Fact:</b> ' . $expert['fact'] . '<br />
			<b>Contact:</b> <a href="mailto:' . $expert['email'] . '">' . $expert['email'] . '</a>
		</div>';
	
		if (!empty($expert['video_url'])) {
		
		$exp_text .= '
			<div class="col-40 ml-5">
				<div class="expert-img">
					<a href="' . $expert['video_url'] . '">
						<span>
							<b>CLICK HERE</b><br />
							to view ' . strstr($expert['name'], ' ', true) . '\'s Bio Video!
						</span>
						<img src="' . $expert['body_image'] . '" alt="" />
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>';

	} else {

	$exp_text .= '
			<div class="col-40 ml-5">
				<div class="expert-img">
					<img src="' . $expert['body_image'] . '" alt="" />
				</div>
			</div>
			<div class="clear"></div>
		</div>';
	}
}
$replace['{EXPERTS}'] = $exp_text;

$page = get_post_by_title('Class');
echo str_replace(array_keys($replace), array_values($replace), $page->post_content);

require(get_template_directory() . '/get-our-app.php');
?>