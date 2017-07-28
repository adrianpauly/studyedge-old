<?php
$home = end(get_objects('Home Page', array('experts')));
?>
<div class="wrap full">
	<div class="full-video"><div></div></div>
	<div class="video">
		<div class="wrap">
			<div class="overlay">
				<h1>Study Smarter, Not Harder.</h1>
				Over 30,000 college students have trusted Zach, Rich, Jenn, Ethan, Andrew, Ashley, Chris, Derek, Lauren, Jack, &amp; our other Study Experts to help them get better grades. Shouldn't you?
				<br /><br />
				<a class="btn" target="_blank" href="http://studyedge.com/app">Start Watching Videos</a> &nbsp;
				<a class="btn transparent" href="#courses">Live Review Schedule</a>
			</div>
			<b></b>
		</div>
	</div>
	<div class="how">
		<span>
			<img src="<?php i() ?>24-7-reviews.png" alt="" width="604" height="346" /><br />
			24/7 review sessions<br />
			<a href="?p=about">Learn More &raquo;</a>
		</span>
		<b>
			=
		</b>
		<span>
			<img src="<?php i() ?>better-grades.png" alt="" width="297" height="360" /><br />
			<a name="courses"></a> <!-- placed here so there is extra space above when scrolling -->
			Better grades in less time<br />
			<a href="?p=about">Learn More &raquo;</a>
		</span>
	</div>
	<div class="classes">
		<div class="wrap">
			<h2>Select Your Course</h2>
			<?php
			$i = 0;
			$cols = array('','','');
			global $classes;
			//$classes is defined in header.php as $classes = get_objects('Class', array('code', 'name'), 'code');
			foreach ($classes as $key => $class) {
				$cols[$i] .= '<a href="?p=class&class=' . $class['id'] . '"><b>' . $class['code'] . '</b> - ' . $class['name'] . '</a>';
				$i = $i == 2 ? 0 : $i + 1;
			}
			echo '<div class="col-3">' . implode('</div><div class="col-3">', $cols) . '</div>';
			?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="experts">
		<h2>The Study Experts</h2>
		<div>
			<?php
			$i = $r = 0;
			$expert_ids = explode(',', preg_replace('/[^\d,]/', '', $home['experts']));
			$experts = get_objects($expert_ids, array('name', 'education', 'expertise', 'fact', 'email', 'video_url', 'face_image'), 'id');
			foreach($expert_ids as $id) {
				if (!isset($experts[$id])) continue;
				$expert = $experts[$id];
				$i++;
				if (($i == 4 && $r == 1) || $i == 5) {
					echo '<div class="clear"></div></div><div' . ($r % 2 == 0 ? ' class="three"' : '') . '>';
					$i = 1;
					$r++;
				}
				?>
				<div class="expert" popup="exp-bio">
					<div>
						<img src="<?php echo $expert['face_image'] ?>" alt="" />
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
							<b>Contact:</b> <?php echo $expert['email'] ?><br />
						</div></div>
						<div class="col-55 ml-5">
							<div class="flowplayer color-light no-background">
								<video autoplay>
									<source type="video/mp4" src="<?php echo $expert['video_url'] ?>">
								</video>
							</div>
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
	<div class="testimonials tk-museo-slab">
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
				$spacer_text .= '<blockquote' . ($key == 1 ? ' class="active"' : '') . '>&ldquo;' . $quote['quote'] . '&rdquo;</blockquote>';
				$quotes_text .= '<blockquote' . ($key == 1 ? ' class="active"' : '') . '><div>&ldquo;' . $quote['quote'] . '&rdquo;</div></blockquote>';
				$testimonials_text .= '<div class="testimonial' . ($key == 1 ? ' active' : '') . '">' .
						'<img src="' . $quote['image'] . '" alt="" />' .
						'<div><h3>' . $quote['name'] . '</h3>' . $quote['position'] . '</div></div>';
				$key++;
			}
			?>
			<div class="spacer">
				<div class="wrap">
					<?php echo $spacer_text ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php
			echo $quotes_text . $testimonials_text;
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="space"></div>
<?php require(get_template_directory() . '/get-our-app.php') ?>
<div class="video-overlay">
	<b></b>
</div>