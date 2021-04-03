<?php
get_header(); // menampilkan header
?>
<section class="main">
    <?php if (get_theme_mod('image-slide-display') == false) {?>
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
            <?php 
                if (get_theme_mod('church-home-counter-display') == true) { 
                    $due_date = get_theme_mod('church-home-counter-date');
                    $date = new DateTime($due_date);
                    $show_date = $date->format('M d, Y');
            ?>
            <div class="absolute update ">
                <div class="text-center ">
                    <div class="title ">
                        <h2 class="text-pink">
                            <small class="text-uppercase text-lato ls1 f12"><?php echo get_theme_mod('church-home-counter-title1'); ?></small><br/>
                            <?php echo get_theme_mod('church-home-counter-title2'); ?>
                        </h2>
                        <p><?php echo $show_date; ?></p>
                    </div>
                    <div class="timer-box clearfix mt50 relative">
                        <div class="col-xs-3 r-line">
                            <p class="text-uppercase text-lato f12">day</p>
                            <p class="f55" id="day"></p>
                        </div>
                        <div class="col-xs-3 r-line">
                            <p class="text-uppercase text-lato f12">hour</p>
                            <p class="f55" id="hour"></p>
                        </div>
                        <div class="col-xs-3 r-line">
                            <p class="text-uppercase text-lato f12">minute</p>
                            <p class="f55" id="minute"></p>
                        </div>
                        <div class="col-xs-3">
                            <p class="text-uppercase text-lato f12">second</p>
                            <p class="f55" id="second"></p>
                        </div>
                        <div class="col-xs-12 mt50">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register-modal">
                            Register
                            </button>
                        </div>
                    </div>
                    <script type="text/javascript">
                        //start counter timer
                            // Set the date we're counting down to
                            var due_date = "<?php echo $due_date; ?>";
                            var countDownDate = new Date(due_date).getTime();
                            // Update the count down every 1 second
                            var x = setInterval(function() {
                                // Get todays date and time
                                var now = new Date().getTime();
                                // Find the distance between now an the count down date
                                var distance = countDownDate - now;
                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                // Output the result in an element with id="timer"
                                document.getElementById("day").innerHTML = days;
                                document.getElementById("hour").innerHTML = hours;
                                document.getElementById("minute").innerHTML = minutes;
                                document.getElementById("second").innerHTML = seconds;
                            }, 1000);
                        //end counter timer
                    </script>
                </div>
            </div>
            <?php 
                    $cat_id = intval(get_theme_mod('church-home-counter-event'));
                    $cat_name = get_the_category_by_ID( $cat_id );
                    include_once('inc/emails/form_email_register_home.php');
                } 
            ?>
        </div>
    </div>
    <?php } ?>
    <?php 
    if (get_theme_mod('church-home-text-display') == false) {
        $home_text_img = wp_get_attachment_url(get_theme_mod('church-home-text-image'));
        $home_text_small = get_theme_mod('church-home-text-small-title');
        $home_text_title = get_theme_mod('church-home-text-title');
        $home_text_desc = get_theme_mod('church-home-text-text');

        if (empty($home_text_img)) {
            $home_text_img = sprintf( '%s/img/dove.png', get_template_directory_uri() );
        }
        if (empty($home_text_small)) {
            $home_text_small = 'WELCOME TO OUR CHURCH';
        }
        if (empty($home_text_title)) {
            $home_text_title = 'Our core value teach the Bible, Build Families, Love our Neighbors';
        }
        if (empty($home_text_desc)) {
            $home_text_desc = "Our core value are teach the Bible, building families, love our neighbors, serving people. Join us at 'the church' and get connected to our church community.";
        }
    ?>
    <div id="welcome" class="clearfix b-line">
        <div class="container text-center mt100 mb100">
            <div class="col-md-10 col-md-offset-1">
                <div class="title ">
                    <img alt="" src="<?php echo $home_text_img; ?>" >
                    <h2 class="text-dark-grey">
                        <small class="text-uppercase text-lato ls1 f12"><?php echo $home_text_small; ?></small><br/>
                        <?php echo $home_text_title; ?>
                    </h2>
                    <div class="cross"></div>
                </div>
                <p class="mt50"><?php echo $home_text_desc; ?></p>
            </div>
        </div>
    </div>
    <?php } 
?>
<div class="col-9 main-products">
    Featured Product
    <?php
    echo do_shortcode('[featured_products paginate="false" limit="4" show_catalog_ordering="no"]');
    ?>
    Product
<?php
    echo do_shortcode('[products paginate="true" limit="30" orderby="popularity"]'); ?>
</div>
<?php
do_action( 'show_custom_loop_category' );
?>
<?php
 if (get_theme_mod('church-home-post-display1') == true) { ?>
    <div id="event" class="clearfix b-line">
        <div class="container  mt100 mb100">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="title ">
                    <h2 class="text-dark-grey">
                        <small class="text-uppercase text-lato ls1 f12"><?php echo get_theme_mod('church-home-post-small-title1') ?></small><br/>
                        <?php echo get_theme_mod('church-home-post-title1') ?>
                    </h2>
                    <div class="cross"></div>
                </div>
                <p class="mt50 mb50"><?php echo get_theme_mod('church-home-post-text1') ?></p>
            </div>
            <div class="col-md-12">
                <div class="row masonry-box">
                    <?php
                        $cat_id = intval(get_theme_mod('church-home-post-cat1'));
                        if ($cat_id > 0) :
                            $event = new WP_Query('cat='.$cat_id.'&posts_per_page=6');

                            if ($event->have_posts()) :
                                while ($event->have_posts()) : $event->the_post();
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 item-masonry">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="event-item mb30">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <img class="img-responsive" alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'small-thumbnail') ?>">
                                            <?php } ?>
                                            <div class="caption f12 ls1 text-lato  text-white bg-black-50">
                                                <?php the_time('F jS, Y') ?><br/>
                                                <span><?php the_title(); ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                endwhile;
                            endif;
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 item-masonry text-center">
                                <a href="<?php echo get_category_link($cat_id); ?>" class="btn btn-lg btn-primary mt15">More Event</a>
                            </div>
                            <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
        <?php if (get_theme_mod('church-home-page-display1') == true) { ?>
    <div id="event" class="clearfix b-line">
        <div class="container  mt100 mb100">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="title ">
                    <h2 class="text-dark-grey">
                        <small class="text-uppercase text-lato ls1 f12"><?php echo get_theme_mod('church-home-page-small-title1') ?></small><br/>
                        <?php echo get_theme_mod('church-home-page-title1') ?>
                    </h2>
                    <div class="cross"></div>
                </div>
                <p class="mt50 mb50"><?php echo get_theme_mod('church-home-page-text1') ?></p>
            </div>
            <div class="col-md-12">
                <div class="row masonry-box">
                    <?php
                        $cat_id = intval(get_theme_mod('church-home-page-cat1'));
                        if ($cat_id > 0) :
                            $event = new WP_Query('page_id='.$cat_id);

                            if ($event->have_posts()) :
                                the_title();
                            endif;
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 item-masonry text-center">
                                <a href="<?php echo get_category_link($cat_id); ?>" class="btn btn-lg btn-primary mt15">More Event</a>
                            </div>
                            <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if (get_theme_mod('church-home-post-display2') == true) { ?>
    <div id="community" class="clearfix bg-pattern">
        <div class="container  mt100 mb100">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="title ">
                    <h2 class="text-dark-grey">
                        <small class="text-uppercase text-lato ls1 f12"><?php echo get_theme_mod('church-home-post-small-title2') ?></small><br/>
                        <?php echo get_theme_mod('church-home-post-title2') ?>
                    </h2>
                    <div class="cross"></div>
                </div>
                <p class="mt50 mb50"><?php echo get_theme_mod('church-home-post-text2') ?></p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <?php
                        $cat_id = intval(get_theme_mod('church-home-post-cat2'));
                        if ($cat_id > 0) :
                            $community = new WP_Query('cat='.$cat_id.'&posts_per_page=3');

                            if ($community->have_posts()) :
                                while ($community->have_posts()) : $community->the_post();
                                ?>
                                <div class="col-md-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="community-item mb30 text-center">
                                            <?php the_title(); ?>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                endwhile;
                            endif;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if (get_theme_mod('church-home-post-display3') == true) { ?>
    <div id="blog" class="clearfix b-line">
        <div class="container  mt100 mb100">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="title ">
                    <h2 class="text-dark-grey">
                        <small class="text-uppercase text-lato ls1 f12"><?php echo get_theme_mod('church-home-post-small-title3') ?></small><br/>
                        <?php echo get_theme_mod('church-home-post-small-title3') ?>
                    </h2>
                    <div class="cross"></div>
                </div>
                <p class="mt50 mb50"><?php echo get_theme_mod('church-home-post-text3') ?></p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <?php
                        $cat_id = intval(get_theme_mod('church-home-post-cat3'));
                        if ($cat_id > 0) :
                            $news = new WP_Query('cat='.$cat_id.'&posts_per_page=6');

                            if ($news->have_posts()) :
                                while ($news->have_posts()) : $news->the_post();
                                ?>
                                <div class="col-md-3">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="blog-item">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <img class="img-responsive" alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'small-thumbnail') ?>">
                                            <?php } ?>
                                            <div class="title">
                                                <p><?php the_title(); ?></p>
                                                <span class="f11 ls1 text-bold text-lato"> <?php the_time('m/d/Y'); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                endwhile;
                            endif;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<!-- start config slick -->
<script>
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        arrows: false,
        slidesToShow: 1,
        adaptiveHeight: true
    });
</script>
<?php
get_footer(); // menampilkan footer
?>