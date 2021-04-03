<div class="clearfix b-line bg-pattern">
    <div class="container mt25 mb15">
        <div class="12">
            <div class="title">
                <h1 class="text-pink text-bold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<div id="galleries" class="clearfix">
    <div class="container  mt100 mb100">
        <div class="row">
            <?php
                $map = get_theme_mod('church-email-contact-map');
                if (!empty($map)) {
                    ?>
                    <div class="col-md-12 mb50">
                        <?php echo do_shortcode($map); ?>
                    </div>
                    <?php
                }
            ?>
            
            <?php 
                if (get_theme_mod('church-email-contact-showform') == true) {
                    include_once('inc/emails/form_email_contact.php');
                }
            ?>
            <div class="col-md-6 mb50">
                <?php if (has_post_thumbnail()) { ?>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="img-responsive mb25">
                <?php } ?>
                <p class="mt50 mb50"><?php the_content(); ?></p>
            </div>
        </div>
    </div>
</div>