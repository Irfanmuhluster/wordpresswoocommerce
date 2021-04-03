<div class="event-item mb50">
    <div class="row">
        <?php if (!is_search()) { ?>
            <div class="col-md-5">
            <?php if (has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"><img class="img-responsive" alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'small-thumbnail') ?>"></a>
            <? } ?>
                <div class="caption f12 ls1 text-lato text-uppercase text-white bg-black-50">
                    <?php the_time('F jS, Y') ?>
                </div>
            </div>
        <? } ?>
        <div class="col-md-7">
            <h4 class="title text-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p class="text-lato detail-box"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Detail</a>
        </div>
    </div>
</div>