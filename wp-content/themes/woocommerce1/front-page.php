<?php
    get_header(); // menampilkan header
    $categories = get_the_category();
    $cat_code = $categories[0]->slug;
    $cat_name = $categories[0]->cat_name;
?>
        <main>
        <?php if (get_theme_mod('image-slide-display') == true) {?>
    <div id="slider" class="clearfix">
        <div class="relative">
            <div class="slider">
                <?php
                    $slider1 = wp_get_attachment_url(get_theme_mod('image-slider1'));
                    $slider2 = wp_get_attachment_url(get_theme_mod('image-slider2'));
                    $slider3 = wp_get_attachment_url(get_theme_mod('image-slider3'));
                    $def_slider_url = sprintf( '%s/img/img1.jpg', get_template_directory_uri() );

                    if (empty($slider1)) {
                        $slider1 = $def_slider_url;
                    }
                    if (empty($slider2)) {
                        $slider2 = $def_slider_url;
                    }
                    if (empty($slider3)) {
                        $slider3 = $def_slider_url;
                    }
                ?>
                    <div><img alt="" src="<?php echo $slider1; ?>" class="img-responsive"></div>
                    <div><img alt="" src="<?php echo $slider2; ?>" class="img-responsive"></div>
                    <div><img alt="" src="<?php echo $slider3; ?>" class="img-responsive"></div>
             </div>

        </div>
    </div>
    <?php }
     if (get_theme_mod('image-promo-display') == true) { 
        $promo1 = wp_get_attachment_url(get_theme_mod('image-promo1'));
        $promo2 = wp_get_attachment_url(get_theme_mod('image-promo2'));
        $def_promo_url = sprintf( '%s/img/promotion-banner-design-1.jpg', get_template_directory_uri() );
        $def_promo_url2 = sprintf( '%s/img/promotion-banner-design-2.jpg', get_template_directory_uri() );
        if (empty($promo1)) {
            $promo1 = $def_promo_url;
        }
        if (empty($promo2)) {
            $promo2 = $def_promo_url2;
        }
        
    ?>
        
            <div class="container banner">
                <div class="banner-box">
                    <img class="banner-img" src="<?php echo $def_promo_url ?>" alt="" srcset="">
                </div>
                <div class="banner-box">
                    <img class="banner-img" src="<?php echo $def_promo_url2 ?>" alt="" srcset="">
                </div>
            </div>
            <?php
     }
     if (get_theme_mod('kategori-display') == true) {
         ?>

            <div class="container kategori">
            <?php
                do_action('show_custom_loop_category'); 
            ?>
            </div>

        <?php
     } 
     if (get_theme_mod('featured-display') == true) {
        $featuredlabel =  get_theme_mod('featured-label');
        if (empty($featuredlabel)) {
            $featuredlabel = 'Produk Pilihan';
        }
         ?>

            <div class="container padding-3">
                <div class="heading-space-between padding-bottom-1setengah">
                    <div class="heading"><?php echo $featuredlabel; ?></div>
                    <a class="link-promo" href="<?php echo site_url('shop') ?>"><span>Lihat semua »</span></a>
                </div>
                <!-- <div class="product"> -->
                <?php
                    echo do_shortcode('[featured_products paginate="false" limit="4" show_catalog_ordering="no"]'); ?>
                <!-- </div> -->
            </div>

        <?php
     }
     if (get_theme_mod('bestselling-product-display') == true) {
         $bestsellingproduct =  get_theme_mod('bestselling-product-label');
         if (empty($bestsellingproduct)) {
             $$bestsellingproduct = 'Produk Terlaris';
         } ?>

            <div class="container padding-3">
                <div class="heading-space-between padding-bottom-1setengah">
                    <div class="heading"><?php echo $bestsellingproduct; ?></div>
                    <a class="link-promo" href="<?php echo site_url('shop') ?>"><span>Lihat semua »</span></a>
                </div>
                <!-- <div class="product"> -->
                <?php
                    echo do_shortcode('[product paginate="false" limit="4" best_selling="true" show_catalog_ordering="no"]'); ?>
                <!-- </div> -->
            </div>

        <?php
     }
     if (get_theme_mod('woocommerce1-img-bottom-display') == true) {

        $slider1 = wp_get_attachment_url(get_theme_mod('woocommerce1-img-bottom1'));
        $slider2 = wp_get_attachment_url(get_theme_mod('woocommerce1-img-bottom2'));
        $slider3 = wp_get_attachment_url(get_theme_mod('woocommerce1-img-bottom3'));
        $slider4 = wp_get_attachment_url(get_theme_mod('woocommerce1-img-bottom4'));
        $def_slider_url = sprintf( '%s/img/kaos1.jpg', get_template_directory_uri() );

        if (empty($slider1)) {
            $slider1 = $def_slider_url;
        }
        if (empty($slider2)) {
            $slider2 = $def_slider_url;
        }
        if (empty($slider3)) {
            $slider3 = $def_slider_url;
        }
        if (empty($slider4)) {
            $slider4 = $def_slider_url;
        }
         ?>
            <div class="promo">
                <div class="promo-box">
                    <img src="<?php echo $slider1 ?>" class="img-box" alt="" srcset="">
                </div>
                <div class="promo-box">
                    <img src="<?php echo $slider2 ?>" class="img-box" alt="" srcset="">
                </div>
                <div class="promo-box">
                    <img src="<?php echo $slider3 ?>" class="img-box" alt="" srcset="">
                </div>
                <div class="promo-box">
                    <img src="<?php echo $slider4 ?>" class="img-box" alt="" srcset="">
                </div>
            </div>
        <?php
    } ?>
        </main>
        <script>
            $('.slider').slick({
                // dots: true,
                infinite: true,
                speed: 300,
                arrows: true,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                adaptiveHeight: true
            });
        </script>
        <!-- footer  -->
        <?php
        get_footer();
        ?>
