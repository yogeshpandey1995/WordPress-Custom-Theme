<?php

/**
 * The template for displaying the blog's listing
 * 
 * @link  https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 */

get_header(); ?>

<div>
    <?php
    if (have_posts()) {

        while (have_posts()) :
            the_post();

            echo "<h1>Display Blog Listing</h1>";

        endwhile;

        the_posts_navigation();
    } else {
        get_template_part('template-parts/content', 'none');
    }
    ?>
</div>

<?php get_footer(); ?>