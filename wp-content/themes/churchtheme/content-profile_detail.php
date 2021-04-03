<div class="clearfix ">
    <div class="container mt25 mb15">
        <div class="12">
            <div class="title">
                <h1 class="text-pink text-bold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<div id="contact" class="clearfix">
	<div class="container  mt100 mb50">
		<div class="row">
			<div class="col-md-3">
				<div class="pastor-item text-center mb100">
					<?php if (has_post_thumbnail()) { ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="img-responsive img-raised img-center img-rounded">
                    <?php } ?>
					<h5 class="mt25 text-black"> <?php the_title(); ?></h5>
				</div>
			</div>
			<div class="col-md-8 readability">
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</div>
</div>