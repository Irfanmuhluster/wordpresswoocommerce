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
<div id="blogs" class="clearfix">
    <div class="container  mt25 mb50">
        <div class="row">
            <div class="col-md-12 mb50 center">
                <?php
                    if (background_image() != '') { 
                        echo '<img class="img-responsive" src="'.background_image().'"/>';
                    } else {
                        $def_slider_url = sprintf( '%s/img/img1.jpg', get_template_directory_uri() );
                        echo '<img class="img-responsive" src="'.$def_slider_url.'"/>';
                    }
                ?>
            </div>
            <div class="col-md-7 col-md-offset-1 r-line mb50">
                <div class="readability">
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <p class="text-dark-grey">
                    <small class="text-uppercase text-lato ls1 f12 text-black text-bold">Related Article</small>
                </p>
                <?php
                    $tags = wp_get_post_tags($post->ID);

                    if ($tags) {
                        $first_tag = $tags[0]->term_id;
                        $tag_ids = array();
                        foreach ($tags as $individual_tag) {
                            $tag_ids[] = $individual_tag->term_id;
                        }

                        $args = array(
                            'tag__in' => $tag_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>5,
                            'caller_get_posts'=>1
                        );
                    } else {
                        $categories = get_the_category();
                        $cat_id = $categories[0]->term_id;
                        $args = array(
                            'cat' => $cat_id,
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>5,
                            'caller_get_posts'=>1
                        );
                    }

                    $my_query = new WP_Query($args);
                    ?>
                    <ul class="list-unstyled f14">
                    <?php
                    if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?><br/><span class="f11 ls1 text-bold text-lato text-grey"> <?php the_time('m/d/Y') ?></span></a></li>
                         
                        <?php
                        endwhile;
                    }
                    ?>
                    </ul>
                    <?php
                    wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</div>