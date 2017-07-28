<?php
global $blog_id;
$objects = get_objects('Home Page', array('experts', 'paragraph', 'video_url'));
$home = end($objects);
?>
<div class="wrap full mobile-hide">
	<div class="full-video"><div><b></b></div></div>
	<div class="video" data-video="<?php echo $home['video_url'] ?>">
		<div class="overlay">
			<h1>Study Smarter, Not Harder.</h1>
			<?php echo $home['paragraph'] ?>
			<div class="buttons">
				<a class="btn" target="_blank" href="http://studyedge.com/app" popup="facebook-app">Start Watching Videos</a> &nbsp;
				<?php if (SHOW_CLASSES) echo '<a class="btn transparent" id="lrs-button" href="#courses">Review Schedule</a>' ?>					
			</div>
			<div class="hover">
				<b class="white"></b>
				<b class="blue"></b>
				<span>Intro Video</span>
			</div>
		</div>
		<div class="hand-phone"></div>
	</div>
	<div class="how">
		<span>
			<img src="<?php echo get_template_directory_uri(); ?>/img/24-7-reviews.png" alt="" width="604" height="346" /><br />
			24/7 review sessions<br />
			<a href="about">Learn More &raquo;</a>
		</span>
		<b>
			=
		</b>
		<span>
			<img src="<?php echo get_template_directory_uri(); ?>/img/better-grades.png" alt="" width="297" height="360" /><br />
			<a name="courses"></a> <!-- placed here so there is extra space above when scrolling -->
			Better grades in less time<br />
			<a href="about">Learn More &raquo;</a>
		</span>
	</div>
</div>
<a class="mobile-show mobile-video" href="<?php echo $home['video_url'] ?>">
	<img style="display:block" alt="" src="http://studyedge.com.s3.amazonaws.com/images/banners/home.jpg" />
	<span>
		<b></b>
		<img class="play" alt="" src="http://studyedge.com.s3.amazonaws.com/images/play.png" />
	</span>
	<h3>Study Smarter, Not Harder.</h3>
</a>
<div class="wrap full">
	<?php if (SHOW_CLASSES) { ?>
		<div class="classes">
			<div class="wrap">
				<h2>Select Your Course</h2>
				<?php
				$i = 0;
				$cols = array('','','');
				global $classes;
				$count = count($classes);
				$per_col = ceil($count/3);
				$mod = $count % 3;
				//$classes is defined in header.php as $classes = get_objects('Class', array('code', 'name'), 'code');
				foreach ($classes as $key => $class) {
					if ($i < $per_col)
						$col = 0;
					elseif ($i < $per_col * 2 - 1 || ($i == $per_col * 2 - 1 && ($mod == 2 || $mod == 0)))
						$col = 1;
					else
						$col = 2;
					$cols[$col] .= '<a href="?p=class&class=' . $class['id'] . '"><b>' . $class['code'] . '</b> - ' . $class['name'] . '</a>';
					$i++;
				}
				echo '<div class="col-3">' . implode('</div><div class="col-3">', $cols) . '</div>';
				?>
				<div class="clear"></div>
			</div>
		</div>
	<?php } ?>
	<div id="experts" class="experts mobile-hide">
		<h2>The Study Experts</h2>
		<div>
			<?php
			$i = $r = 0;
			$expert_ids = explode(',', preg_replace('/[^\d,]/', '', $home['experts']));
			$experts = get_objects($expert_ids, array('name', 'education', 'expertise', 'fact', 'email', 'video_url', 'face_image', 'action_image'), 'id');
			
			$c = count($experts);
			$show_threes = $c % 4 > 0;
			
			foreach($expert_ids as $id) {
				if (!isset($experts[$id])) continue;
				$expert = $experts[$id];
				$i++;
				if (($i == 4 && $r % 2 > 0 && $show_threes) || $i == 5) {
					echo '<div class="clear"></div></div><div' . ($r % 2 == 0 && $show_threes ? ' class="three"' : '') . '>';
					$i = 1;
					$r++;
				}
				?>
				<div class="expert" popup="exp-bio">
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
								<img src="<?php echo $expert['face_image'] ?>" alt="" />
							</div>
							<div class="back">
								<img src="<?php echo $expert['action_image'] ?>" alt="" />
							</div>
						</div>
						<b></b>
					</div>
					<h4><?php echo $expert['name'] ?></h4>
					<h5><?php echo $expert['expertise'] ?></h5>
					<div style="display:none" class="popup-text"><!-- for popup -->
						<h1><?php echo $expert['name'] ?></h1>
						<div class="col-40"><div class="padded">
							<b>Education:</b> <?php echo $expert['education'] ?><br />
							<b>Study Expert in:</b> <?php echo $expert['expertise'] ?><br />
							<b>Fun Fact:</b> <?php echo $expert['fact'] ?><br />
							<b>Contact:</b> <a href="mailto:<?php echo $expert['email'] ?>"><?php echo $expert['email'] ?></a><br />
						</div></div>
						<div class="col-55 ml-5">
							<?php if (!empty($expert['video_url'])) : ?>
								<?php if( strpos($expert['video_url'], 'wistia') !== false ) : ?>
									<?php echo $expert['video_url'] ?>
								<?php else : ?>
									[video=<?php echo $expert['video_url'] ?>]
								<?php endif; ?>
							<?php else : ?>
								<div class="no-bio-video">Sorry, there is no bio video for this Study Expert!</div>
							<?php endif; ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php
			}
			?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="mobile-experts mobile-show">
		<h2>The Study Experts</h2>
		<?php
		foreach($expert_ids as $id) {
			if (!isset($experts[$id])) continue;
			$expert = $experts[$id];
			?>
			<div class="expert">
				<div>
					<img src="<?php echo $expert['face_image'] ?>" alt="" />
				</div>
				<h4><?php echo $expert['name'] ?></h4>
				<h5><?php echo $expert['expertise'] ?></h5>
			</div>
			<?php
		}
		?>
		<div class="clear"></div>
	</div>
	<div class="testimonials tk-museo-slab mobile-hide">
		<div class="wrap">
			<?php
			$key = 0;
			$spacer_text = $quotes_text = $testimonials_text = '';
			$quotes = get_objects('Testimonial', array('quote', 'image', 'name', 'position'));
			
			//Choose 3 random indexes
			$indexes = range(0, count($quotes)-1);
			shuffle($indexes);
			$indexes = array_slice($indexes, 0, 3);

			foreach ($indexes as $index) {
				$quote = $quotes[$index];
				//$spacer_text .= '<blockquote' . ($key == 1 ? ' class="active"' : '') . '>&ldquo;' . $quote['quote'] . '&rdquo;</blockquote>';
				$quotes_text .= '<blockquote' . ($key == 1 ? ' class="active"' : '') . '><div>&ldquo;' . $quote['quote'] . '&rdquo;</div></blockquote>';
				$testimonials_text .= '<div class="testimonial' . ($key == 1 ? ' active' : '') . '">' .
						'<span><img src="' . $quote['image'] . '" alt="" /></span>' .
						'<div><h3>' . $quote['name'] . '</h3>' . $quote['position'] . '</div></div>';
				$key++;
			}
			?>
			<?php echo $quotes_text . $testimonials_text; ?>
			<div class="clear"></div>
		</div>
		<div class="space"></div>
	</div>
	<div class="testimonials tk-museo-slab mobile-show">
		<?php
		$show = 1;
		foreach ($indexes as $index) {
			if (($show--) < 1) break;
			$quote = $quotes[$index];
			echo '<blockquote>&ldquo;' . $quote['quote'] . '&rdquo;</blockquote>' . 
				'<div class="testimonial active">' .
					'<span><img src="' . $quote['image'] . '" alt="" /></span>' .
					'<div><h3>' . $quote['name'] . '</h3>' . $quote['position'] . '</div>' .
				'</div><div class="clear"></div>';
		}
		?>
	</div>
</div>
<?php require(get_template_directory() . '/get-our-app.php') ?>
<div class="video-overlay">
	<b></b>
</div>
