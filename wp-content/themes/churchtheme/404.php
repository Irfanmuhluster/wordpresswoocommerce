<?php
get_header(); // menampilkan header
?>
<div class="footer">
    <section class="main">
        <div class="text-center ls1">
            <div class="container mb50">
                <div class="row">
                    <div class=" col-md-12 ">
                        <div class="content text-center">
                            <div class="col-md-12">
                                <h1 class="text-pink text-lato text-bold f150 mt100">404</h1>
                            </div>
                            <div class="col-md-12">
                                <span class="text-white">Oops, Page Not Found!</span>
                            </div>
                            <div class="col-md-12 mt25 mb100">
                                <a href="<?php echo get_home_url(); ?>" class="btn btn-primary btn-lg">
                                    Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer(); // menampilkan footer
?>