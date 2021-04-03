<?php
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
// load the css resource
function churchtheme_resources() 
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'churchtheme', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.css');
    wp_enqueue_style( 'font-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css');
    wp_enqueue_style( 'litebox', get_template_directory_uri() . '"/js/lightbox/css/lightbox.css');
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery-js', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'litebox-js', get_template_directory_uri() . '/js/lightbox/js/lightbox.js', array( 'jquery' ) );
    wp_enqueue_script( 'churchtheme-js', get_template_directory_uri() . '/js/churchtheme.js', array( 'jquery' ) );
}

add_action('wp_enqueue_scripts', 'churchtheme_resources');

// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// custom article length
function custom_article_length() 
{
    return 20;
}

add_filter('excerpt_length', 'custom_article_length');

// setup theme
function setup_theme() 
{
    // add navigation menu
    register_nav_menus(array(
        'main' => 'Main Menu',
        // 'footer' => 'Footer Menu'
    ));

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // add featured image (if the theme not support)
    add_theme_support('post-thumbnails');
    // add custom logo
    add_theme_support('custom-logo');
    // add custom background color
    add_theme_support( 'custom-background' );
    // add resizing image with 180x120 px size
    add_image_size('small-thumbnail', 295, 189, true);
    // add resizing image with 1140x430 px size on top left croping position
    add_image_size('banner-thumbnail', 1140, 430, array('left', 'top'));
}

add_action('after_setup_theme', 'setup_theme');

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail_cek';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? $product->get_image( $image_size ) : '';
}

function custom_loop_category()
{

    // Get all product categories
    $product_category_terms = get_terms( array(
        'taxonomy'   => "product_cat",
        'hide_empty' => 1,
    ));

    foreach($product_category_terms as $term){
        // Get the term link (if needed)
        $term_link = get_term_link( $term, 'product_cat' );

        ## -- Output Example -- ##

        // The link (start)
        echo '<a href="' . $term_link . '" style="display:inline-block; text-align:center; margin-bottom: 14px;">';

        // Display the product category thumbnail
        woocommerce_subcategory_thumbnail( $term );

        // Display the term name
        echo $term->name;

        // Link close
        echo '</a>';
    }
    # code...
}

add_action('show_custom_loop_category', 'custom_loop_category');


// Add Widget Areas
function ourWidgetsInit() 
{
    /*register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));*/

    register_sidebar( array(
        'name' => __('Footer Area 1'),
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar( array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar( array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar( array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

// feature - front page
require get_template_directory() . '/inc/features/front_page_section.php';
// feature - email
require get_template_directory() . '/inc/features/emails_section.php';
// install included plugins
require get_template_directory() . '/inc/features/tgmpa_plugins_activation.php';
?>