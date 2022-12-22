/*---- Get Logo ----*/

$default_logo = get_bloginfo('template_url') . '/images/logo.png';
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
if (has_custom_logo()) {
    $default_logo = esc_url($image[0]);
}
?>

<img loading='lazy' class='img-fluid' src='<?php echo $default_logo ?>' alt='logo'>

/*---- Get Menu 1 ----*/
<?php
wp_nav_menu(
    array(
        'theme_location' => 'primary_menu',
        'menu_class' => 'navbar-nav',
        'menu_id' => 'navbar-nav_id',
        'container' => 'div',
        'container_class' => 'main-nav',
        'depth' => 3,
    )
)
?>

/*---- Get Menu 2 ----*/
<?php
$location_details = get_nav_menu_locations();
$menu_id = $location_details['primary_menu'];

$menu_item = wp_get_nav_menu_items($menu_id);
?>
<ul class="navbar-nav">
    <?php
    foreach ($menu_item as $value) :
    ?>
        <li class="nav-item"><a href="<?php echo $value->url; ?>" class="nav-link"><?php echo $value->title; ?></a></li>
    <?php
    endforeach;
    ?>
</ul>

/*---- Get Title ----*/
<?php echo get_the_title(); ?>

/*---- Get Post Link ----*/
<?php echo get_the_permalink(); ?>

/*---- Get Feature Image ----*/
<?php if (!empty(get_the_post_thumbnail())) { ?>
    <?php the_post_thumbnail(); ?>
<?php } else { ?>
    <img src="/wp-content/uploads/2022/11/test.png" alt="test" />
<?php } ?>

/*---- Get Auther ----*/
<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><strong><?php the_author(); ?></strong></a>

/*---- Get Date & Time ----*/
<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="entry-date"><?php the_time('F j, Y') ?></a> | <?php the_time(); ?>

/*---- Get Pagination ----*/
<?php the_posts_pagination(array(
    'mid-size' => 3,
    'prev_text' => __('« previous'),
    'next_text' => __('next »'),
)); ?>

/*---- Get single Categories ----*/
<?php $term_list = get_the_terms(get_the_ID(), 'Categories');
echo $term_list[0]->name;

/*---- Get Multipul Categories ----*/
$postcat = get_the_category();
if ($postcat) {
    foreach ($postcat as $cat) {
        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
    }
}

$posttags = get_the_tags();
if ($posttags) {
    foreach ($posttags as $tag) {
        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
    }
}

/*---- Get Shot Description ----*/
echo get_the_content();

/*---- Get Shot Description ----*/
echo get_the_excerpt();

/*---- Get Customizer ----*/
echo get_option('footer_logo_setting') ?>
<?php echo get_theme_mod('heading_setting') ?>

/*---- Get Widgets ----*/
<?php if (is_active_sidebar('blog_sidebar')) {
    dynamic_sidebar('blog_sidebar');
}

/*---- Create Shortcode ----*/
function shortcode_function()
{
    require get_template_directory() . '/inc/widgets.php';
}
add_shortcode('shortcode_name', 'shortcode_function');

/*---- WP_Query ----*/
$args = array('post_type' => 'post', 'category_name' => 'latest-news', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC',);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) :
    while ($the_query->have_posts()) :
        $the_query->the_post();
    endwhile;
endif;
wp_reset_postdata();
wp_reset_query();

/*---- Get Search Form ----*/
<?php get_search_form(); ?>

/*---- Get Sidebar ----*/
get_sidebar(); ?>

/*---- Include File In Function File ----*/
ob_start();
require get_template_directory() . '/inc/c_editor_c_widgets.php';
return ob_get_clean();

/*---- Template Call ----*/
/**
 * Template Name: Full Width Page
 */

/*---- Last Modify Version ----*/
fileemtime(plugin_dir_path(__FILE__) . 'FOLDER PATH');
