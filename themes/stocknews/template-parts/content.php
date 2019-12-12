<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stocknews
 */

// !!! Error checking before trying to pull company data
$stockSymbol = get_post_meta(get_the_ID(),'stock-symbol')[0];
$stockData = apply_filters('sn_company_info',$stockSymbol);
set_query_var('stock-data',$stockData);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

		?>
			<div class="entry-meta">
                <a href="<?php echo home_url().'?sn_company='.$stockSymbol; ?>"><?php echo $stockData['profile']['companyName']; ?> Profile</a>
                <br>
				<?php
				stocknews_posted_on();
				stocknews_posted_by();
				?>
			</div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'stocknews' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stocknews' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php stocknews_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
    if (get_post_type() == 'sn_recommendation'){
    
    ?>
    
    <aside id="secondary" class="widget-area">
        <?php 
            //var_dump($stockData);
            get_template_part( 'template-parts/company-profile');
        ?>
    </aside><!-- #secondary -->
    
    <?php
     }