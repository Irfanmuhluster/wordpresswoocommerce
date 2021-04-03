<div class="col-md-4 col-sm-4 col-xs-12 item-masonry">
    <div class="pastor-item text-center mb100">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) { ?>
                <img class="img-responsive img-raised img-center img-rounded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
            <? } ?>
            <h5 class="mt25 text-black"><?php the_title(); ?></h5>
        </a>
    </div>
</div>