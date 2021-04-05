<?php
get_header(); // menampilkan header

$slug = basename(get_permalink());
// var_dump($slug);
    if ($slug == 'product') {
        get_template_part('content','shop');
    } else {
     if($slug=='cart') {
        ?>
        
        <section class="site-main main-cart" role="main">
    <?php }
        else {
            ?>
        
    <section class="site-main main" role="main">


<?php
        }
// menampilkan post artikel
if (have_posts()) : 
    while (have_posts()) : the_post(); ?>
        <h1 class="heading2">
            <?php the_title(); ?> 
        </h1>
    <?php
    the_content(); ?>
   
	
   <?php endwhile; ?>
<?php endif; ?>
</section>
<?php
    }
get_footer(); // menampilkan footer
?>
<style>
    .main-cart {
        display: block !important;
    }
    .woocommerce {
        padding-left: 6rem;
        padding-right: 6rem;
    }
</style>