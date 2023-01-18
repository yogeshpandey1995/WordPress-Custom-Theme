<?php

/**
 * The template for displaying search forms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WordPress
 * 
 */

?>

<form action="<?php echo home_url('/'); ?>" method="get">
    <div class="input-group">
        <input type="text" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search post..." name="s" required />
        <button id="search-button" type="submit" class="btn btn-dark btn-md" style="border-radius:0 5px 5px 0">
            <i class="fas fa-search"></i>
        </button>
        <input type="hidden" name="post_type" value="post" />
    </div>
</form>