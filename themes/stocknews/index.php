<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stocknews
 */
//var_dump($wp_query);
//exit();
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main index-page">
        <h1 class="entry-title">Recent Recommendations</h1>
        <div class="entry-content">
		<?php
            echo apply_filters('sn_company_previous', null, 'sn_recommendation', null, true); 
        ?>
        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
