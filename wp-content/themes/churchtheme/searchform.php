<form role="search" method="get" id="searchform" class="searchform mt25 mb25" action="<?php echo home_url('/'); ?>">
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<div class="form-group">
		<input type="text" class="form-control" value="" name="s" id="s" placeholder="<?php the_search_query(); ?>">
		</div>
		<input class="btn btn-lg btn-primary" type="submit" id="searchsubmit" value="Search">
	</div>
</form>