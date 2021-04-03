<?php
get_header(); // menampilkan header

$slug = basename(get_permalink());
// var_dump($categories);
    if ($slug == 'product') {
        get_template_part('content','shop');
    } else {
        ?>
<section class="site-main main" role="main">
	<!-- saasa;ldasldlasdksladklasdklsadlksadlk -->
<?php
// menampilkan post artikel
if (have_posts()) {
    while (have_posts()) : the_post(); ?>
	<?php
    the_title();
    the_content();
    endwhile;
    // get_template_part('content','page');
} ?>
</section>
<?php
    }
get_footer(); // menampilkan footer
?>