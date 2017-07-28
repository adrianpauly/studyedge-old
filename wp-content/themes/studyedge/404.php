<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage StudyEdge
 * @since Study Edge 1.0
 */

get_header();

?>

    <div class="page-404">
        <div class="heading-404">
            <h1>Oops... not much going on here</h1>
            <h2>Let us help you find your way</h2>
        </div>
        <div class="content-404">
            <p>The page you're looking for is no longer here. Please use the navigation menu above to browse our site. You can also:</p>
            <ul>
                <li><a href="mailto:help@studyedge.com">Contact us</a> and we'll do our best to help you.</li>
                <li>Visit our <a href="/faq">Help/FAQ</a> page</li>
                <li>Go back to our <a href="/">home page</a> and start over</li>
            </ul>
        </div>
    </div>

<?php get_footer(); ?>