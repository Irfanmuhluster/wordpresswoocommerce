<?php
get_header(); // menampilkan header
?>
<section class="main">
<?php
// menampilkan post artikel
if (have_posts()) {
	while (have_posts()) {
        woocommerce_content();

		get_template_part('content','page');
	}
}
?>
</section>
<?php
get_footer(); // menampilkan footer
?>