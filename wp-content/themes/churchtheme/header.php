<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php 
            wp_head();

            $sitekey = '"'.get_theme_mod('church-email-setting-sitekey').'"';
        ?>
        <?php
        if (get_theme_mod('church-email-setting-addcaptcha') == true) {
        ?>
        <!-- google recaptcha -->
        <script>
            var recaptchaform;
            var onloadCallback = function() {
                recaptchaform = grecaptcha.render('recaptchaform', {
                    'sitekey' : <?php echo $sitekey; ?>, 
                    'theme' : 'light'
                });
              };
        </script>
        <?php
        }

        if (is_404()) {
            $class_404 = 'bg404';
        }
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="site-container <?php echo $class_404; ?>">
            <!-- start header section -->
            <section class="header">
                <?php if (get_theme_mod('church-top-header-display') == false) { 
                    $tophead = get_theme_mod('church-top-header-headline');
                    $topdesc = get_theme_mod('church-top-header-text');
                    if (empty($tophead)) {
                        $tophead = 'MATTEW 25:40';
                    }
                    if (empty($topdesc)) {
                        $topdesc = '" The King will reply, ‘Truly I tell you, whatever you did for one of the least of these brothers and sisters of mine, you did for me. "';
                    }
                ?>
                    <div id="top-bar" class="bg-black f12 clearfix">
                        <div class="container">
                            <span class="chapter  text-white text-lato text-bold text-uppercase ls1"><a href="<?php echo home_url(); ?>"><?php echo $tophead; ?></a></span> <br class="visible-sm visible-xs"/>
                            <span class="verse  text-grey"><?php echo $topdesc; ?></span>
                        </div>
                    </div>
                <?php 
                    } 
                    if ( has_nav_menu( 'main' ) || has_custom_logo() ) {
                ?>
                <div id="menu" class="bg-white clearfix">
                    <header class=" navbar navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#bs-navbar" data-toggle="collapse" type="button"> 
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button> 
                                <a href="index.html" class="navbar-brand">
                                    <?php the_custom_logo(); ?>
                                    <h1 class="hidden"><?php bloginfo('name'); ?></h1>
                                </a>
                            </div>
                            <?php if (has_nav_menu( 'main' )) { ?>
                                <nav class="collapse navbar-collapse" id="bs-navbar">
                                    <?php 
                                        $par = array(
                                            'theme_location' => 'main',
                                            'items_wrap' => '<ul id="%1$s" class="nav navbar-nav navbar-left text-lato text-bold f16">%3$s</ul>'
                                        );

                                        wp_nav_menu($par);
                                    ?>
                                    <ul id="site-header-cart" class="nav navbar-nav navbar-left text-lato text-bold f16">
                                        <li>
                                            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>
                                        </li>
                                    </ul>
                                </nav>
                            <?php } ?>
                        </div>
                    </header>
                </div>
                <?php } ?>
            </section>
            <!-- end header section -->