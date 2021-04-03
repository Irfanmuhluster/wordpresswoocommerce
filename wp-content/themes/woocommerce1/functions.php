<?php
// require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
// load the css resource
function woocommerce_resources() 
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_register_style( 'style_css', get_template_directory_uri() . '/css/styles.css', false, '1.0.0');
    // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_register_style( 'style_slider', get_template_directory_uri() . '/css/style-csslider.css');
    // wp_enqueue_style( 'churchtheme', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'font-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    // wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_style('style_css');
    wp_enqueue_style('style_slider');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.css');
    wp_enqueue_script( 'jquery-js', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ) );
 }

add_action('wp_enqueue_scripts', 'woocommerce_resources');



function setup_theme() 
{
    register_nav_menus(array(
        'top_menu' => 'Main Menu',
        // 'footer' => 'Footer Menu'
    ));

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


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


add_filter( 'get_product_search_form', 'my_get_product_search_form', 999999 );
function my_get_product_search_form( $form ) {
    // var_dump(get_query_var('taxonomy'));
    if ( get_query_var('taxonomy') && get_query_var('taxonomy') === 'product_cat' ) {
        $cat_id = get_queried_object_id();
        // var_dump($cat_id);
        $pattern = '/<form[Ss]*?>/i';
        $add = '${0}<input type="hidden" name="product_cat" id="product_cat" value="'.$cat_id.'" />';
        $form = preg_replace( $pattern, $add, $form );
    }
    return $form;
}
 
add_action( 'pre_get_posts', 'my_pre_get_posts_overwrite', 999 );
function my_pre_get_posts_overwrite( $query ) {
    // var_dump($_GET);
    if ( isset( $_GET['s'] ) && isset( $_GET['categories']) && isset( $_GET['post_type']  )) {
        $query->set( 'tax_query',array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $_GET['categories'],
                'field' => 'ID',
                'include_children' => true,
                'operator' => 'IN'
            )
        ) );
    }
}

function ourWidgetsInit(){
    register_sidebar(array(
        'name' => 'Kategori',
        'id' => 'kategori',
        'before_widget' => '<div class="card-body">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => 'Produk Terbaru / Terlaris',
        'id' => 'produkterbaru',
        'before_widget' => '<div class="card-body">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => 'Cari Berdasarkan Kategori',
        'id' => 'searchcategory',
        'before_widget' => '<div class="card-body">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'ourWidgetsInit');

if (class_exists('WooCommerce')) {
    function woocommerceshop_add_woocommerce_support(){
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'woocommerceshop_add_woocommerce_support');

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}


require get_template_directory() . '/inc/features/front_page_section.php';
