<?php
// Custom Top Header
function top_header($wp_customize)
{
    $wp_customize->add_section('woocommerce1-top-header-section', array(
        'title' => 'Top Header',
        'priority' => 10,
    ));

    $wp_customize->add_setting('woocommerce1-top-header-display', array(
        'default'        => true,
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'woocommerce1-top-header-display-control', array(
        'label' => __('Tampilkan bagian ini?'),
        'section' => 'woocommerce1-top-header-section',
        'description' => 'Bagian ini untuk menampilkan email, no whatapp dan no telp.',
        'settings' => 'woocommerce1-top-header-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('woocommerce1-top-header-1', array(
        'default' => 'info@gmail.com'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'woocommerce1-top-header-1-control', array(
        'label' => 'Email',
        'section' => 'woocommerce1-top-header-section',
        'settings' => 'woocommerce1-top-header-1'
    )));


    $wp_customize->add_setting('woocommerce1-top-header-2', array(
        'default' => '085123456789'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'woocommerce1-top-header-2-control', array(
        'label' => 'No Telp',
        'section' => 'woocommerce1-top-header-section',
        'settings' => 'woocommerce1-top-header-2'
    )));


    $wp_customize->add_setting('woocommerce1-top-header-3', array(
        'default' => '085123456789'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'woocommerce1-top-header-3-control', array(
        'label' => 'Whatapps',
        'section' => 'woocommerce1-top-header-section',
        'settings' => 'woocommerce1-top-header-3'
    )));
}

add_action('customize_register', 'top_header');



// custom image slider
function woocommerce1_img_slider($wp_customize) 
{
    $wp_customize->add_section('woocommerce1-img-slider-section', array(
        'title' => 'Slider Halaman Beranda',
        'priority' => 11,
    ));

    $wp_customize->add_setting('image-slide-display', array(
        'default'        => true,
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'image-slide-display-control', array(
        'label' => 'Tampilkan bagian ini',
        'section' => 'woocommerce1-img-slider-section',
        'settings' => 'image-slide-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('image-slider1');
    $wp_customize->add_setting('image-slider2');
    $wp_customize->add_setting('image-slider3');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control1', array(
            'label' => 'Image 1',
            'section' => 'woocommerce1-img-slider-section',
            'settings' => 'image-slider1',
            'width' => 1261,
            'height' => 476
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control2', array(
            'label' => 'Image 2',
            'section' => 'woocommerce1-img-slider-section',
            'settings' => 'image-slider2',
            'width' => 1261,
            'height' => 476
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control3', array(
            'label' => 'Image 3',
            'section' => 'woocommerce1-img-slider-section',
            'settings' => 'image-slider3',
            'width' => 1261,
            'height' => 476
    )));
}

add_action('customize_register', 'woocommerce1_img_slider');


// custom image slider
function woocommerce1_img_promote($wp_customize) 
{
    $wp_customize->add_section('woocommerce1-img-promo-section', array(
        'title' => 'Banner Promo',
        'priority' => 12,
    ));

    $wp_customize->add_setting('image-promo-display', array(
        'default'        => true,
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'image-promo-display-control', array(
        'label' => 'Tampilkan bagian ini',
        'section' => 'woocommerce1-img-promo-section',
        'settings' => 'image-promo-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('image-promo1');
    $wp_customize->add_setting('image-promo2');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-promo-control1', array(
            'label' => 'Image 1',
            'section' => 'woocommerce1-img-promo-section',
            'settings' => 'image-promo1',
            'width' => 581,
            'height' => 256
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-promo-control2', array(
            'label' => 'Image 2',
            'section' => 'woocommerce1-img-promo-section',
            'settings' => 'image-promo2',
            'width' => 581,
            'height' => 256
    )));

}

add_action('customize_register', 'woocommerce1_img_promote');


function custom_loop_category2($wp_customize)
{

    $wp_customize->add_section('woocommerce1-kategori-section', array(
        'title' => 'Tampilkan Daftar Kategori',
        'priority' => 14,
    ));

    $wp_customize->add_setting('kategori-display', array(
        'default'        => true,
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'kategori-display-control', array(
        'label' => 'Tampilkan bagian ini?',
        'section' => 'woocommerce1-kategori-section',
        'settings' => 'kategori-display',
        'type' => 'checkbox'
    )));

    # code...
}

function just_category () {
    // // Get all product categories
    $product_category_terms = get_terms( array(
        'taxonomy'   => "product_cat",
        'hide_empty' => 1,
    ));

    foreach($product_category_terms as $term){
        // Get the term link (if needed)
        $term_link = get_term_link( $term, 'product_cat' );

        ## -- Output Example -- ##
        // woocommerce_subcategory_thumbnail( $term )
        // The link (start)
        echo '
        <div class="kategori-box">';
        woocommerce_subcategory_thumbnail( $term);
            echo       '<div class="overlay">
                    <div class="text">
                        <a href="' . $term_link . '">'.$term->name.'</a>
                    </div>
                </div>
            </div>';
    }
}


add_action('show_custom_loop_category', 'just_category');
add_action('customize_register', 'custom_loop_category2');
 

function featured_product($wp_customize)
{

    $wp_customize->add_section('woocommerce1-featured-section', array(
        'title' => 'Daftar Produk Pilihan',
        'priority' => 14,
    ));

    $wp_customize->add_setting('featured-display', array(
        'default'        => true,
    ));


    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'featured-display-control', array(
        'label' => 'Tampilkan bagian ini?',
        'section' => 'woocommerce1-featured-section',
        'settings' => 'featured-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('featured-label', array(
        'default' => 'Produk Pilihan',
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'featured-label-control', array(
        'label' => 'Label',
        'section' => 'woocommerce1-featured-section',
        'settings' => 'featured-label'
    )));
    # code...
}
 
add_action('customize_register', 'featured_product');


function bestselling_product($wp_customize)
{

    $wp_customize->add_section('bestselling-product-section', array(
        'title' => 'Daftar Produk Terlaris',
        'priority' => 14,
    ));

    $wp_customize->add_setting('bestselling-product-display', array(
        'default'        => true,
    ));


    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'bestselling-product-display-control', array(
        'label' => 'Tampilkan bagian ini?',
        'section' => 'bestselling-product-section',
        'settings' => 'bestselling-product-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('bestselling-product-label', array(
        'default' => 'Produk Terlaris',
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'bestselling-product-label-control', array(
        'label' => 'Label',
        'section' => 'bestselling-product-section',
        'settings' => 'bestselling-product-label'
    )));
    # code...
}
 
add_action('customize_register', 'bestselling_product');


// custom image slider
function woocommerce1_img_bottom($wp_customize) 
{
    $wp_customize->add_section('woocommerce1-img-bottom-section', array(
        'title' => 'Banner Bawah',
        'priority' => 15,
    ));

    $wp_customize->add_setting('woocommerce1-img-bottom-display', array(
        'default'        => true,
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'woocommerce1-img-bottom-display-control', array(
        'label' => 'Tampilkan bagian ini',
        'section' => 'woocommerce1-img-bottom-section',
        'settings' => 'woocommerce1-img-bottom-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('woocommerce1-img-bottom1');
    $wp_customize->add_setting('woocommerce1-img-bottom2');
    $wp_customize->add_setting('woocommerce1-img-bottom3');
    $wp_customize->add_setting('woocommerce1-img-bottom4');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'woocommerce1-img-bottom-control1', array(
            'label' => 'Image 1',
            'section' => 'woocommerce1-img-bottom-section',
            'settings' => 'woocommerce1-img-bottom1',
            'width' => 273,
            'height' => 200
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'woocommerce1-img-bottom-control2', array(
            'label' => 'Image 2',
            'section' => 'woocommerce1-img-bottom-section',
            'settings' => 'woocommerce1-img-bottom2',
            'width' => 273,
            'height' => 200
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'woocommerce1-img-bottom-control3', array(
            'label' => 'Image 3',
            'section' => 'woocommerce1-img-bottom-section',
            'settings' => 'woocommerce1-img-bottom3',
            'width' => 273,
            'height' => 200
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'woocommerce1-img-bottom-control4', array(
            'label' => 'Image 4',
            'section' => 'woocommerce1-img-bottom-section',
            'settings' => 'woocommerce1-img-bottom4',
            'width' => 273,
            'height' => 200
    )));
}

add_action('customize_register', 'woocommerce1_img_bottom');

 function size_of_category_thumb($u)
 {
     return array('50', '50',true);
 }
 add_filter('subcategory_archive_thumbnail_size', 'size_of_category_thumb');
 
 function size_of_product_thumb($u)
 {
     return array(750, 940,true);
 }
 add_filter('single_product_archive_thumbnail_size', 'size_of_product_thumb');


?>