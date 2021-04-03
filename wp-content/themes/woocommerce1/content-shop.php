<?php
get_header(); // menampilkan header
?>
<section class="site-main main" role="main">
	<!-- saasa;ldasldlasdksladklasdklsadlksadlk -->
    <div class="sidebar">
        <div class="card">
        <div class="card-header">Kategori Produk
        </div>
        <?php
                if(is_active_sidebar('kategori')) {
                    dynamic_sidebar('kategori');
                }
        ?>
        </div>
        <div class="card">
      <?php echo get_sidebar( 'shop' ); ?>
        <div class="card-header">Produk Terbaru</div>
        <?php
                if(is_active_sidebar('produkterbaru')) {
                    dynamic_sidebar('produkterbaru');
                }
        ?>
        </div>
    
    </div>
    <?php
        echo do_shortcode('[products limit="8" columns="4" orderby="popularity" class="quick-sale" paginate="true" on_sale="true"]');
    ?>
</section>
<?php
get_footer(); // menampilkan footer
?>