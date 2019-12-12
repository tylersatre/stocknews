<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stocknews
 */

if (get_post_type() == 'sn_news'){
    
?>

<aside id="secondary" class="widget-area">
	it's a news side bar
</aside><!-- #secondary -->

<?php
return; } else {  ?>

<aside id="secondary" class="widget-area">
	it's not news
</aside><!-- #secondary -->

<?php }