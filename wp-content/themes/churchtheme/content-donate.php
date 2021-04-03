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
<div id="donation" class="clearfix">
    <div class="container  mt25 mb50">
        <div class="row">
            <div class="col-md-6 mb50">
                <?php the_content(); ?>
            </div>
            <?php 
                if (get_theme_mod('church-email-donate-showform') == true) {
                    include_once('inc/emails/form_email_donate.php');
                }
            ?>
        </div>
    </div>
</div>