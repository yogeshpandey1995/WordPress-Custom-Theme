<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 */

get_header(); ?>

<div>
    <h1>Archive Page</h1>
    <?php
    if (is_author()) :
        echo "Author Archive";

    elseif (is_category()) :
        echo "Category Archive";

    elseif (is_tag()) :
        echo "Tag Archive";

    elseif (is_day()) :
        echo "Day Archive";

    elseif (is_month()) :
        echo "Month Archive";

    elseif (is_year()) :
        echo "Year Archive";

    elseif (is_date()) :
        echo "Date Archive";

    endif;
    ?>
</div>

<?php
get_footer();
