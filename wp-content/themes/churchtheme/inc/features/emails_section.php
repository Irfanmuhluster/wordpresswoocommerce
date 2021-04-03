<?php
// custom setting for sending email
function email_setting($wp_customize) 
{
    $wp_customize->add_section('church-email-setting-section', array(
        'title' => 'Email Settings',
        'priority' => 19
    ));

    // $wp_customize->add_setting('church-email-setting-showform');
    $wp_customize->add_setting('church-email-setting-adminemail');
    $wp_customize->add_setting('church-email-setting-adminname');
    $wp_customize->add_setting('church-email-setting-addcaptcha');
    $wp_customize->add_setting('church-email-setting-sitekey');
    $wp_customize->add_setting('church-email-setting-secretkey');

    // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-showform-control', array(
    //     'label' => 'Activate form registration email?',
    //     'section' => 'church-email-setting-section',
    //     'settings' => 'church-email-setting-showform',
    //     'type' => 'checkbox'
    // )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-adminemail-control', array(
            'label' => 'Admin Email Address',
            'section' => 'church-email-setting-section',
            'settings' => 'church-email-setting-adminemail',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-adminname-control', array(
            'label' => 'Admin Name',
            'section' => 'church-email-setting-section',
            'settings' => 'church-email-setting-adminname',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-addcaptcha-control', array(
            'label' => 'Add a reCAPTCHA?',
            'section' => 'church-email-setting-section',
            'settings' => 'church-email-setting-addcaptcha',
            'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-sitekey-control', array(
            'label' => 'Site Key',
            'section' => 'church-email-setting-section',
            'settings' => 'church-email-setting-sitekey',
            'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'church-email-setting-secretkey-control', array(
            'label' => 'Secret Key',
            'section' => 'church-email-setting-section',
            'settings' => 'church-email-setting-secretkey',
            'type' => 'password'
    )));
}

add_action('customize_register', 'email_setting');

// custom setting for email contact
function register_email_setting($wp_customize) 
{
    $base_name = 'church-email-registration';
    $wp_customize->add_section($base_name.'-section', array(
        'title' => 'Registration Email',
        'priority' => 19
    ));

    $wp_customize->add_setting($base_name.'-showform');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-showform-control', array(
        'label' => 'Display this form?',
        'section' => $base_name.'-section',
        'settings' => $base_name.'-showform',
        'description' => 'Choose categories : ',
        'type' => 'checkbox'
    )));

    $categories = get_categories();
    foreach ($categories as $k => $v) {
        $name_set = $base_name.'-cat'.$v->term_id;
        $wp_customize->add_setting($name_set);

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, $name_set.'-control', array(
            'label' => $v->name,
            'section' => $base_name.'-section',
            'settings' => $name_set,
            'type' => 'checkbox'
        )));
    }
}

add_action('customize_register', 'register_email_setting');

// custom setting for email contact
function contact_email_setting($wp_customize) 
{
    $base_name = 'church-email-contact';
    $wp_customize->add_section($base_name.'-section', array(
        'title' => 'Contact Email',
        'priority' => 19
    ));

    $wp_customize->add_setting($base_name.'-showform');
    $wp_customize->add_setting($base_name.'-showmap');
    $wp_customize->add_setting($base_name.'-cat');
    $wp_customize->add_setting($base_name.'-map');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-showform-control', array(
        'label' => 'Display this form?',
        'section' => $base_name.'-section',
        'settings' => $base_name.'-showform',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-showmap-control', array(
        'label' => 'Display this map?',
        'section' => $base_name.'-section',
        'settings' => $base_name.'-showmap',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-map-control', array(
        'label' => 'Map shortcode',
        'section' => $base_name.'-section',
        'settings' => $base_name.'-map',
        'description' => 'To use this section please install <a href="'.get_site_url('/wp-content/themes/').'/wp-admin/themes.php?page=tgmpa-install-plugins">Intergeo Maps</a> plugin then use it to create a map and paste here the shortcode generated',
        'type' => 'text'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-control', array(
            'label' => 'Contact Page',
            'section' => $base_name.'-section',
            'settings' => $base_name.'-cat',
            'type' => 'dropdown-pages'
    )));
}

add_action('customize_register', 'contact_email_setting');

// custom setting for email donate
function donate_email_setting($wp_customize) 
{
    $base_name = 'church-email-donate';
    $wp_customize->add_section($base_name.'-section', array(
        'title' => 'Donation Email',
        'priority' => 19
    ));

    $wp_customize->add_setting($base_name.'-showform');
    $wp_customize->add_setting($base_name.'-cat');
    $wp_customize->add_setting($base_name.'-currency');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-showform-control', array(
        'label' => 'Display this form?',
        'section' => $base_name.'-section',
        'settings' => $base_name.'-showform',
        'type' => 'checkbox'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-cat-control', array(
            'label' => 'Donation Page',
            'section' => $base_name.'-section',
            'settings' => $base_name.'-cat',
            'type' => 'dropdown-pages'
    )));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, $base_name.'-currency-control', array(
            'label' => 'Currency',
            'section' => $base_name.'-section',
            'settings' => $base_name.'-currency',
            'type' => 'select',
            'choices' => array( 'IDR' => 'IDR',
                        '$' => '$' )
    )));
}

add_action('customize_register', 'donate_email_setting');