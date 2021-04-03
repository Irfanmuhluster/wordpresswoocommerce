<?php
    get_header(); // menampilkan header
    $categories = get_the_category();
    $cat_code = $categories[0]->slug;
    $cat_name = $categories[0]->cat_name;
?>
<section class="main">
    <div class="clearfix b-line bg-pattern">
        <div class="container mt25 mb15">
            <div class="12">
                <div class="title">
                    <h1 class="text-pink text-bold">
                        <?php echo $cat_name; ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div id="event" class="clearfix">
        <div class="container  mt50 mb50">
            <div class="row">
                <div class=" col-md-12 ">
                    <?php
                    // menampilkan post artikel
                    if (have_posts()) {
                        if ($cat_code == 'pastors' || $cat_code == 'profile' || $cat_code == 'team') {
                            echo '<div class="row masonry-box">';
                            while (have_posts()) {
                                the_post();

                                get_template_part('content', 'profile');
                            }
                            echo '</div>';
                        } else {
                            while (have_posts()) {
                                // echo "salmd;oaslkd;slakds;alkd;laskds;lakd;lk;slks;le";
                                the_post();

                                get_template_part('content');
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    get_footer(); // menampilkan footer
?>