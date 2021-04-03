<?php
get_header(); // menampilkan header

// menampilkan post artikel
if (have_posts()) { ?>
<section class="main">
    <div class="clearfix">
        <div class="container mt25 mb15">
            <div class="12">
                <div class="title">
                    <h1 class="text-pink text-bold">
                        Search results for : <?php the_search_query(); ?>
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
                        while (have_posts()) {
                            the_post();

                            get_template_part('content');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
get_footer(); // menampilkan footer
?>