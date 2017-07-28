<?php
/**
 * @package WordPress
 * @subpackage Study_Edge
 * @since Study Edge 1.0
 */

global $sites, $settings;

// router.php handles GET parameters and cookies
//require('router.php');

$_GET['p'] = isset($_GET['p']) ? str_replace('./', '/', $_GET['p']) : 'home';
if (!file_exists(TEMPLATEPATH . '/pages/' . $_GET['p'] . '.php'))  $_GET['p'] = 'home';

// function n($path, $t = false) {
// 	$link = $path;
// 	$path = trim($path, '/');
// 	if ($t === false) $t = ucwords($path);
// 	echo '<a href="' . $link . '"' . ($_GET['p'] == $path ? ' class="active"' : ($_GET['p'] == 'parents' && $path == 'about' ? ' class="active-big"' : '')) . '>' . $t . '</a>';
// }

$sites = array();
$name = $wpdb->get_row("SELECT option_value FROM wp_options WHERE option_name = 'blogname'");
$sites[1] = array(
	'name'	=> $name->option_value,
	'path'	=> '/',
);

$blogs = $wpdb->get_results("SELECT blog_id, path FROM wp_blogs WHERE blog_id > 1");
foreach ($blogs as $blog) {
	$info = $wpdb->get_results("SELECT option_name, option_value FROM wp_{$blog->blog_id}_options WHERE option_name IN ('blogdescription', 'blogname') ORDER BY option_name ASC");
	if (!is_numeric($info[0]->option_value)) continue;
	$sites[$blog->blog_id] = array (
		'name'	=> $info[1]->option_value,
		'path'	=> $blog->path,
	);
}

$other = array();
$other_sites = array(
	'Santa Fe College',
	'University of Central Florida',
	'University of Georgia',
	'University of Michigan',
	'University of South Florida' );

foreach ($other_sites as $site) {
	$other[] = array(
		'name'	=>	$site,
		'path'	=>	'/other',
	);
}

$other[] = array(
	'name'	=>	'Algebra Nation',
	'path'	=>	'/algebranation',
);

$sites = array_merge($sites, $other);

$school_accr = array(
	1 => 'UF',
	2 => 'FSU',
); 

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo $_GET['p'] . ' ' . str_replace('/','',$current_blog->path) ?>">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="apple-itunes-app" content="app-id=550020899" />
	<meta name="google-play-app" content="app-id=com.purelogics.studyedge" />
	<meta name="description" content="Over 50,000 UF students have trusted Zach, Rich, Jenn, Ethan, Ashley, Chris, Jack, Jordan, Marty, Peter, & our other Study Experts to help them get better grades. Shouldn't you?" />

	<title>
	<?php if(is_front_page() OR is_page('home')) {
		bloginfo('site_name');
	} else {
		$title = wp_title('',false);
		if(trim($title) == 'Page not found') {
			echo 'Study Edge | ';
			bloginfo('site_name');
		} else {
			wp_title( '|', true, 'right' );
			echo 'Study Edge';
		}
	} ?> 
	</title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/style.css">

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<base href="<?php echo $current_blog->path ?>" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<?php wp_head() ?>

	<script src="//use.typekit.net/bxb0gte.js"></script>
	<script type="text/javascript">
		try{
			Typekit.load();
		} catch(e){}
		sites = [<?php
				$i = 0;
				foreach ($sites as $id => $site) {
					$i++;
					$active = (!$new && ($id + 1) == BLOG) ? 'true' : 'false';
					echo "{id: '" . ($id + 1) . "', name: '$site[name]', path: '$site[path]', active: $active}" . (count($sites) != $i ? "," : "");
				}
				?>];
		classes = [<?php
				global $classes;
				$i = 0;
				foreach ($classes as $code => $class) {
					$i++;
					echo "{id: '{$class['id']}', code: '$code', name: '{$class['name']}'}" . (count($classes) != $i ? "," : "");
				}
				?>];
	</script>

</head>
<body <?php body_class(); ?>>
	<header>
		<div class="dark">
			<div class="wrap top-bar">
				<a href="https://facebook.com/studyedge" class="facebook-likes"><img src="<?php echo get_template_directory_uri(); ?>/img/like.png" alt="" /> <?php echo isset($settings['likes']) ? $settings['likes'] : '' ?></a>
				<a class="btn grey flat-top" popup="change-school" id="change-school-btn">
					Change School
					<?php echo isset($school_accr[BLOG]) ? ' (' . $school_accr[BLOG] . ')' : '' ?>
					<span class="icon arrow-rt-sm"></span>
				</a>
			</div>
		</div>
		<div class="sticky">
			<div class="wrap">
				<a class="logo" href="?"><img alt="" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" /></a>
			</div>
		</div>
	</header>


<?php 

// echo '<pre>';
// var_dump( menu_link() );
// echo '</pre>';