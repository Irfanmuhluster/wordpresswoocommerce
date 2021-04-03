<?php
$categories = get_the_category();
$cat_code = $categories[0]->slug;
$cat_name = $categories[0]->cat_name;
$cat_id = $categories[0]->term_id;

if ($cat_code != 'event' && $cat_code != 'community') {
    if ($cat_code == 'pastors' || $cat_code == 'profile' || $cat_code == 'team') {
        get_template_part('content','profile_detail');
    } else {
        get_template_part('content','news');
    }
} else {
?>
    <div class="clearfix ">
        <div class="container mt25 mb15">
            <div class="12">
                <div class="title">
                    <h1 class="text-pink text-bold">
                        <?php the_title(); ?>
                    </h1>
                    <p>Posted on : <?php the_time('F jS, Y') ?> </p>
                    <!-- <p>Time : <?php the_time('g:i a') ?></p> -->
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
    if (get_theme_mod('church-email-registration-showform') == true) { 
        $cat_all = get_categories();

        foreach ($cat_all as $k => $v) {
            $base_name = 'church-email-registration-cat'.$v->term_id;
            if (get_theme_mod($base_name) == true && $cat_id == $v->term_id) {
                ?>
                    <div id="event-detail" class="clearfix">
                        <div class="container mb50">
                            <div class="row">
                                <div class="col-md-12 readability">
                                    <button type="button" class="btn btn-primary mt50" data-toggle="modal" data-target="#register-modal">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
            }
        }
        include_once('inc/emails/form_email_register.php');
    }
?>