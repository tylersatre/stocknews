<?php
/**
 * Template part for displaying company info pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stocknews
 */
    $stockSymbol = strtoupper($_GET['sn_company']);
    $stockData = apply_filters('sn_company_info',$stockSymbol);
    set_query_var('stock-data',$stockData);

    $name = $stockData['profile']['companyName'] ?? 'no company name';
    $image = $stockData['profile']['image'] ?? 'no company name';
?>

<article class="sn_company">
	<header class="company-header">
		<img src="<?php echo $image; ?>" class="company-logo">
        <h1 class="entry-title"><?php echo $name; ?></h1>
	</header><!-- .entry-header -->


	<div class="sn-company-content">
        <?php 
            echo apply_filters('sn_company_previous', $stockData['symbol'], 'sn_news','Other Coverage');
            echo apply_filters('sn_company_previous', $stockData['symbol'], 'sn_recommendation','Recommendations'); 
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article>
<aside id="secondary" class="widget-area">
<?php 
        //var_dump($stockData);
        get_template_part( 'template-parts/company-profile');
    ?>
    <?php get_template_part( 'template-parts/company-market-info'); ?>
</aside><!-- #secondary -->
