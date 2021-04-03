<?php 
    $contact_id = get_theme_mod('church-email-contact-cat');
    $donate_id = get_theme_mod('church-email-donate-cat');
    if (is_page($contact_id) && intval($contact_id) > 0) { 
        get_template_part('content','contact');
    } elseif(is_page($donate_id) && intval($donate_id) > 0) {
        get_template_part('content','donate');
    } else {
?>
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
    <div id="event-detail" class="clearfix">
        <div class="container  mt25 mb50">
            <div class="row">
                <div class="col-md-12 readability">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="img-responsive mb25">
                    <?php } ?>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>