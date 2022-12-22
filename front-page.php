<?php

/**
 * The template for displaying the front page <-------> If the user has selected a static page for their homepage, this is what will appear.
 * 
 * @link  https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 */

get_header(); ?>

<main>

    <h1>Front Page</h1>
    <?php the_content(); ?>

</main>

<?php get_footer(); ?>