<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * 
 */

?>

<div class="side_bar">

    <div class="search_form">
        <?php get_search_form(); ?>
    </div>

    <div class="blog_widget">
        <?php dynamic_sidebar('blog_sidebar'); ?>
    </div>

</div>