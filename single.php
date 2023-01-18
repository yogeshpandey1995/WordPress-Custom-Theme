<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * 
 */

get_header(); ?>

<div>
    <?php
    if (have_posts()) :

        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', get_post_type());

        endwhile;

    endif;
    ?>
</div>

<?php get_footer(); ?>