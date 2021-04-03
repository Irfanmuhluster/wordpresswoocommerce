<?php
// Custom Top Header
function top_header($wp_customize) 
{
    $wp_customize->add_section('church-top-header-section', array(
        'title' => 'Top Header',
        'priority' => 10,
    ));

    $wp_customize->add_setting('church-top-header-display');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-top-header-display-control', array(
        'label' => __('Hide this section?'),
        'section' => 'church-top-header-section',
        'settings' => 'church-top-header-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('church-top-header-headline', array(
        'default' => 'MATTEW 25:40'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-top-header-headline-control', array(
        'label' => 'Headline',
        'section' => 'church-top-header-section',
        'settings' => 'church-top-header-headline'
    )));

    $wp_customize->add_setting('church-top-header-text', array(
        'default' => '" The King will reply, ‘Truly I tell you, whatever you did for one of the least of these brothers and sisters of mine, you did for me. "'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-top-header-text-control', array(
        'label' => __('Text'),
        'section' => 'church-top-header-section',
        'settings' => 'church-top-header-text',
        'type' => 'textarea'
    )));
}

add_action('customize_register', 'top_header');

// custom image slider
function church_img_slider($wp_customize) 
{
    $wp_customize->add_section('church-img-slider-section', array(
        'title' => 'Home Image Slider',
        'priority' => 14,
    ));

    $wp_customize->add_setting('image-slide-display');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'image-slide-display-control', array(
        'label' => 'Hide this section?',
        'section' => 'church-img-slider-section',
        'settings' => 'image-slide-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('image-slider1');
    $wp_customize->add_setting('image-slider2');
    $wp_customize->add_setting('image-slider3');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control1', array(
            'label' => 'Image 1',
            'section' => 'church-img-slider-section',
            'settings' => 'image-slider1',
            'width' => 1261,
            'height' => 476
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control2', array(
            'label' => 'Image 2',
            'section' => 'church-img-slider-section',
            'settings' => 'image-slider2',
            'width' => 1261,
            'height' => 476
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'image-slide-control3', array(
            'label' => 'Image 3',
            'section' => 'church-img-slider-section',
            'settings' => 'image-slider3',
            'width' => 1261,
            'height' => 476
    )));
}

add_action('customize_register', 'church_img_slider');

// custom home text
function church_home_text($wp_customize) 
{
    $wp_customize->add_section('church-home-text-section', array(
        'title' => 'Home Custom Text',
        'priority' => 15
    ));

    $wp_customize->add_setting('church-home-text-image');
    $wp_customize->add_setting('church-home-text-small-title', array(
        'default' => 'WELCOME TO OUR CHURCH'
    ));
    $wp_customize->add_setting('church-home-text-title', array(
        'default' => __('Our core value teach the Bible, Build Families, Love our Neighbors')
    ));
    $wp_customize->add_setting('church-home-text-text', array(
        'default' => __("Our core value are teach the Bible, building families, love our neighbors, serving people. Join us at 'the church' and get connected to our church community.")
    ));
    $wp_customize->add_setting('church-home-text-display');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-text-display-control', array(
        'label' => 'Hide this section?',
        'section' => 'church-home-text-section',
        'settings' => 'church-home-text-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'church-home-text-image-control', array(
            'label' => 'Small Image',
            'section' => 'church-home-text-section',
            'settings' => 'church-home-text-image',
            'description' => 'This image must be square, and at least 52 pixels wide and tall.',
            'width' => 52,
            'height' => 52
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-text-small-title-control', array(
            'label' => 'Section Title 1',
            'section' => 'church-home-text-section',
            'settings' => 'church-home-text-small-title',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-text-title-control', array(
            'label' => 'Section Title 2',
            'section' => 'church-home-text-section',
            'settings' => 'church-home-text-title',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-text-text-control', array(
            'label' => 'Section Text',
            'section' => 'church-home-text-section',
            'settings' => 'church-home-text-text',
            'type' => 'textarea'
    )));
}

add_action('customize_register', 'church_home_text');

// custom home post by cat 1
function church_home_post1($wp_customize) 
{
    $wp_customize->add_section('church-home-post-cat1-section', array(
        'title' => 'Home Post 1',
        'priority' => 16
    ));

    $categories = get_categories();
    $arr_cat = array();
    foreach ($categories as $k => $v) {
        $arr_cat[0] = '-- Select Category --';
        $arr_cat[$v->term_id] = $v->name;
    }

    $wp_customize->add_setting('church-home-post-small-title1', array(
        'default' => 'Example Section Title 1'
    ));
    $wp_customize->add_setting('church-home-post-title1', array(
        'default' => 'Example Section Title 2'
    ));
    $wp_customize->add_setting('church-home-post-text1', array(
        'default' => 'Example Section Text'
    ));
    $wp_customize->add_setting('church-home-post-cat1', array(
        'default' => 0
    ));
    $wp_customize->add_setting('church-home-post-display1');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-display1-control', array(
        'label' => 'Display this section?',
        'section' => 'church-home-post-cat1-section',
        'settings' => 'church-home-post-display1',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-small-title1-control', array(
            'label' => 'Section Title 1',
            'section' => 'church-home-post-cat1-section',
            'settings' => 'church-home-post-small-title1',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-title1-control', array(
            'label' => 'Section Title 2',
            'section' => 'church-home-post-cat1-section',
            'settings' => 'church-home-post-title1',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-text1-control', array(
            'label' => 'Section Text',
            'section' => 'church-home-post-cat1-section',
            'settings' => 'church-home-post-text1',
            'type' => 'textarea'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-cat1-control', array(
            'label' => 'Post Category',
            'section' => 'church-home-post-cat1-section',
            'settings' => 'church-home-post-cat1',
            'type' => 'select',
            'choices' => $arr_cat
    )));
}

add_action('customize_register', 'church_home_post1');



function church_home_page1($wp_customize) 
{
    $wp_customize->add_section('church-home-post-page1-section', array(
        'title' => 'Home Page 1',
        'priority' => 20
    ));

    $pages = get_pages();
    // var_dump($pages);
    $arr_cat = array();
    foreach ($pages as $k => $v) {
        $arr_cat[0] = '-- Select Pages --';
        $arr_cat[$v->ID] = $v->post_title;
    }

    $wp_customize->add_setting('church-home-page-small-title1', array(
        'default' => 'Example Section Title 1'
    ));
    $wp_customize->add_setting('church-home-page-title1', array(
        'default' => 'Example Section Title 2'
    ));
    $wp_customize->add_setting('church-home-page-text1', array(
        'default' => 'Example Section Text'
    ));
    $wp_customize->add_setting('church-home-page-cat1', array(
        'default' => 0
    ));
    $wp_customize->add_setting('church-home-page-display1');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-page-display1-control', array(
        'label' => 'Display this section?',
        'section' => 'church-home-post-page1-section',
        'settings' => 'church-home-page-display1',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-page-small-title1-control', array(
            'label' => 'Section Title 1',
            'section' => 'church-home-post-page1-section',
            'settings' => 'church-home-page-small-title1',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-page-title1-control', array(
            'label' => 'Section Title 2',
            'section' => 'church-home-post-page1-section',
            'settings' => 'church-home-page-title1',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-page-text1-control', array(
            'label' => 'Section Text',
            'section' => 'church-home-post-page1-section',
            'settings' => 'church-home-page-text1',
            'type' => 'textarea'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-page-cat1-control', array(
            'label' => 'Post Category',
            'section' => 'church-home-post-page1-section',
            'settings' => 'church-home-page-cat1',
            'type' => 'select',
            'choices' => $arr_cat
    )));
}

add_action('customize_register', 'church_home_page1');




// custom home post by cat 2
function church_home_post2($wp_customize) 
{
    $wp_customize->add_section('church-home-post-cat2-section', array(
        'title' => 'Home Post 2',
        'priority' => 17
    ));

    $categories = get_categories();
    $arr_cat = array();
    foreach ($categories as $k => $v) {
        $arr_cat[0] = '-- Select Category --';
        $arr_cat[$v->term_id] = $v->name;
    }

    $wp_customize->add_setting('church-home-post-small-title2', array(
        'default' => 'Example Section Title 1'
    ));
    $wp_customize->add_setting('church-home-post-title2', array(
        'default' => 'Example Section Title 2'
    ));
    $wp_customize->add_setting('church-home-post-text2', array(
        'default' => 'Example Section Text'
    ));
    $wp_customize->add_setting('church-home-post-cat2', array(
        'default' => 0
    ));
    $wp_customize->add_setting('church-home-post-display2');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-display2-control', array(
        'label' => 'Display this section?',
        'section' => 'church-home-post-cat2-section',
        'settings' => 'church-home-post-display2',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-small-title2-control', array(
            'label' => 'Section Title 1',
            'section' => 'church-home-post-cat2-section',
            'settings' => 'church-home-post-small-title2',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-title2-control', array(
            'label' => 'Section Title 2',
            'section' => 'church-home-post-cat2-section',
            'settings' => 'church-home-post-title2',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-text2-control', array(
            'label' => 'Section Text',
            'section' => 'church-home-post-cat2-section',
            'settings' => 'church-home-post-text2',
            'type' => 'textarea'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-cat2-control', array(
            'label' => 'Post Category',
            'section' => 'church-home-post-cat2-section',
            'settings' => 'church-home-post-cat2',
            'type' => 'select',
            'choices' => $arr_cat
    )));
}

add_action('customize_register', 'church_home_post2');

// custom home post by cat 3
function church_home_post3($wp_customize)
{
    $wp_customize->add_section('church-home-post-cat3-section', array(
        'title' => 'Home Post 3',
        'priority' => 18
    ));

    $categories = get_categories();
    $arr_cat = array();
    foreach ($categories as $k => $v) {
        $arr_cat[0] = '-- Select Category --';
        $arr_cat[$v->term_id] = $v->name;
    }

    $wp_customize->add_setting('church-home-post-small-title3', array(
        'default' => 'Example Section Title 1'
    ));
    $wp_customize->add_setting('church-home-post-title3', array(
        'default' => 'Example Section Title 2'
    ));
    $wp_customize->add_setting('church-home-post-text3', array(
        'default' => 'Example Section Text'
    ));
    $wp_customize->add_setting('church-home-post-cat3', array(
        'default' => 0
    ));
    $wp_customize->add_setting('church-home-post-display3');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-display3-control', array(
        'label' => 'Display this section?',
        'section' => 'church-home-post-cat3-section',
        'settings' => 'church-home-post-display3',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-small-title3-control', array(
            'label' => 'Section Title 1',
            'section' => 'church-home-post-cat3-section',
            'settings' => 'church-home-post-small-title3',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-title3-control', array(
            'label' => 'Section Title 2',
            'section' => 'church-home-post-cat3-section',
            'settings' => 'church-home-post-title3',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-text3-control', array(
            'label' => 'Section Text',
            'section' => 'church-home-post-cat3-section',
            'settings' => 'church-home-post-text3',
            'type' => 'textarea'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-post-cat3-control', array(
            'label' => 'Post Category',
            'section' => 'church-home-post-cat3-section',
            'settings' => 'church-home-post-cat3',
            'type' => 'select',
            'choices' => $arr_cat
    )));
}

add_action('customize_register', 'church_home_post3');

// custom text on footer
function footer_custom_text($wp_customize) 
{
    $wp_customize->add_section('church-footer-text-section', array(
        'title' => 'Footer Custom Text',
        'priority' => 20,
    ));

    $wp_customize->add_setting('church-footer-text-display');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-footer-text-display-control', array(
        'label' => 'Hide this section?',
        'section' => 'church-footer-text-section',
        'settings' => 'church-footer-text-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_setting('church-footer-text-custom', array(
        'default' => 'www.churchtheme.com'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-footer-text-custom-control', array(
        'label' => 'Custom Text',
        'section' => 'church-footer-text-section',
        'settings' => 'church-footer-text-custom'
    )));

    $wp_customize->add_setting('church-footer-text-link', array(
        'default' => '#'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-footer-text-link-control', array(
        'label' => 'Custom Link',
        'section' => 'church-footer-text-section',
        'settings' => 'church-footer-text-link'
    )));
}

add_action('customize_register', 'footer_custom_text');

// setting home counter
function church_home_counter($wp_customize)
{
    $wp_customize->add_section('church-home-counter-section', array(
        'title' => 'Home Counter',
        'priority' => 14
    ));

    $categories = get_categories();
    $arr_cat = array();
    foreach ($categories as $k => $v) {
        $arr_cat[0] = '-- Select Category --';
        $arr_cat[$v->term_id] = $v->name;
    }
    // Add A Date Picker
    require_once dirname(__FILE__) . '/date/date-picker-custom-control.php';

    $wp_customize->add_setting('church-home-counter-date', array(
        'default' => date('Y-m-d')
    ));
    $wp_customize->add_setting('church-home-counter-title1', array(
        'default' => 'UPCOMING EVENT'
    ));
    $wp_customize->add_setting('church-home-counter-title2', array(
        'default' => 'Sunday School Program'
    ));
    $wp_customize->add_setting('church-home-counter-event', array(
        'default' => 0
    ));
    $wp_customize->add_setting('church-home-counter-display');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-counter-display-control', array(
        'label' => 'Display this section?',
        'section' => 'church-home-counter-section',
        'settings' => 'church-home-counter-display',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-counter-title1-control', array(
        'label' => 'Main Title',
        'section' => 'church-home-counter-section',
        'settings' => 'church-home-counter-title1',
        'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-counter-title2-control', array(
            'label' => 'Event Title',
            'section' => 'church-home-counter-section',
            'settings' => 'church-home-counter-title2',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-counter-date-control', array(
            'label' => 'Event Due Date',
            'section' => 'church-home-counter-section',
            'settings' => 'church-home-counter-date',
            'type' => 'date'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-home-counter-event-control', array(
            'label' => 'Event Category',
            'section' => 'church-home-counter-section',
            'settings' => 'church-home-counter-event',
            'type' => 'select',
            'choices' => $arr_cat
    )));
}

add_action('customize_register', 'church_home_counter');