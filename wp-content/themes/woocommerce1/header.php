<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
            wp_head();
    ?>
    
    <title> <?php bloginfo('name'); ?></title>
</head>

<body>

<header class="container">
    <?php if (get_theme_mod('woocommerce1-top-header-display') == true) { 
        $topemail = get_theme_mod('woocommerce1-top-header-1');
        $topwa = get_theme_mod('woocommerce1-top-header-3');
        $toptelp = get_theme_mod('woocommerce1-top-header-2');

        if (empty($topemail)) {
            $topemail = 'info@emeraldeveloper.com';
        }

        if (empty($topwa)) {
            $topwa = '081123456789';
        }

        if (empty($toptelp)) {
            $toptelp = '081123456789';
        }
                  
    ?>
    <div class="sub-nav">
        <div class="sub-nav-menu">
            <ul class="sub-nav-list">
                <li> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> <?php echo $topemail; ?></a>  </li>
                <li> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?php echo $toptelp; ?></a>  </li>
                <li> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" fill="white" stroke-linecap="round" stroke-linejoin="round"/></svg></a> <?php echo $topwa; ?>  </li>
            </ul>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="search-header">
        <div class="search-header_logo">
            <div class="logo">Nama / Logo </div>
        </div>
        <div class="search-header_search">
            <form action="" method="post" class="search-header_logo_form">
                <input type="text" class="search" name="s" id="" placeholder="Cari Produk">
                <button type="submit" class="search_submit">Search</button>
            </form>
        </div>
        <div class="search-header_cart">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  width="20" height="20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"> 
                    
                    <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>
        </div>
    </div>
    <nav id="navbar-header" class="navbar container navbar-fixed">

        <div class="navbar-btn"  id="nav-btn">
            <div class="navbar-links">
                <?php
                $par = array(
                    'theme_location' => 'top_menu',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav">%3$s</ul>'
                );

                wp_nav_menu($par);
                ?>
            </div>
        </div>
      
        <div class="hambergur-menu-container">
            <div class="hambergur-menu">
                <!-- hide show  -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </nav>
</header>