<div class="home">
	<div class="experts">
		<h2>The Study Experts</h2>
		<div>
			<?php
			$objects = get_objects('Home Page', array('experts', 'paragraph', 'video_url'));
			$home = end($objects);
			
			$i = $r = 0;
			$expert_ids = explode(',', preg_replace('/[^\d,]/', '', $home['experts']));
			$experts = get_objects($expert_ids, array('name', 'education', 'expertise', 'fact', 'email', 'video_url', 'face_image'), 'id');
			
			$c = count($experts);
			$show_threes = $c % 4 > 0;
			
			foreach($expert_ids as $id) {
				if (!isset($experts[$id])) continue;
				$expert = $experts[$id];
				$i++;
				if (($i == 4 && $r % 2 > 0 && $show_threes) || $i == 5) {
					echo '<div class="clear"></div></div><div' . ($r % 2 == 0 ? ' ' : '') . '>';
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
							<b>Contact:</b> <a href="mailto:<?php echo $expert['email'] ?>"><?php echo $expert['email'] ?></a><br />
						</div></div>
						<div class="col-55 ml-5">
							[video=<?php echo $expert['video_url'] ?>]
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
</div>
