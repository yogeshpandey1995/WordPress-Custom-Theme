<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

            get_template_part("template-parts/content", get_post_format());

        endwhile;
    else :
        echo "No Post Found";
    endif;
    ?>
</div>

<?php get_footer(); ?>