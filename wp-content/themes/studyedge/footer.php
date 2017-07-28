<?php
/**
 * @package WordPress
 * @subpackage Study_Edge
 * @since Study Edge 1.0
 */

global $blog_id;
?>
	<footer class="wrap full">
		<div class="wrap">
			<div class="footer-menu mobile-hide">
				<a href="./">Home</a>
				<a href="/about">About</a>
				<a href="/parents/">Parents &amp; Professors</a>
				<a href="/pricing">Pricing</a>
				<?php
				if (SHOW_CLASSES)
					echo '<a href="./#courses" popup="class-select">' . ($blog_id == 1 ? 'Schedule' : 'Courses') . '</a>';
				if ($blog_id == 1)
					echo '<a href="/directions">Directions</a>';
				?>
				<a href="/faq">Help/FAQ</a>
			</div>
			<div class="contact-info">
				<h3>Stay in Touch</h3>
				<div class="social">
					<a href="http://facebook.com/studyedge" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="" /></a>
					<a href="http://twitter.com/studyedge" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="" /></a>
					<a href="http://instagram.com/studyedge" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png" alt="" /></a>
					<a href="http://youtube.com/studyedge" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.png" alt="" /></a>
				</div>
				<a href="tel:1-888-97-78839">1-888-97-STUDY</a><br />
				<a href="mailto:help@studyedge.com">help@studyedge.com</a><br />
				<?php if ($blog_id == 1) { ?>
					1717 NW 1st Ave.<br />
					Gainesville, FL 32603<br />
					Sunday-Friday, 10am-8pm
				<?php } ?>
			</div>
			<div class="footer-logos">
				<ul>
					<li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-ufsg.png" alt="UF Student Government Approved"></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-gain.png" alt="Gainesville Area Innovation Network"></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/img/logo-gacc.png" alt="Gainesville Area Chamber of Commerce"></li>
					<li><a href="http://www.moreinmidtown.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-mim.png" alt="More in Midtown"></a></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="copy">
				Copyright <?php echo date('Y') ?> &copy; Study Edge &nbsp;
				<!--<?php
				define('END_TIME', microtime(true));
				echo (END_TIME - START_TIME)*1000 . " ms";
				?>-->
			</div>
		</div>
	</footer>
	<div id="popup-overlay" popup="close"></div>
	<div id="popup"><div></div></div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var content = $('#schedule a')
			console.log(content);
		});
	</script>
	<script>
	 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	 ga('create', 'UA-73254367-1', 'auto');
	 ga('send', 'pageview');

	</script>	
	<?php //wp_footer(); ?>
</body>
</html>
