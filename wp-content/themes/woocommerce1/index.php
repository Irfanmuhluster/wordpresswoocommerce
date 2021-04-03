<?php
    get_header(); // menampilkan header
    $categories = get_the_category();
    $cat_code = $categories[0]->slug;
    $cat_name = $categories[0]->cat_name;
?>
        <main  id="main" class="woocommerce site-main" role="main">

        <?php
                    // menampilkan post artikel
                    if (have_posts()) {
                        if ($cat_code == 'profile') {
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

        </main>

        <!-- footer  -->
