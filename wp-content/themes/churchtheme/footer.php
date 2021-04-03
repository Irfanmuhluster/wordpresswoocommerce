<?php
    if (is_404()) {
    ?>
                <?php
                if (get_theme_mod('church-footer-text-display') == false) {
                    $footer_text = get_theme_mod('church-footer-text-custom');
                    $footer_text_link = get_theme_mod('church-footer-text-link');

                    if (empty($footer_text)) {
                        $footer_text = 'www.churchtheme.com';
                    }
                    if (empty($footer_text_link)) {
                        $footer_text_link = '#';
                    }
                ?>
                <section class="footer text-center ls1 text-white text-lato pt15 pb15">
                    <a href="<?php echo $footer_text_link; ?>"><?php echo $footer_text; ?></a>
                </section>
                <?php } ?>
            </div>
        </div>
    <?php
    } else {
?>
        </div>
        <footer>
            <!-- footer-widgets -->
            <div id="contact" class="clearfix bg-black">
                <div class="container mt50 mb50">
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
                            $count_act = 0;
                            for ($i=1; $i <= 4; $i++) { 
                                if (is_active_sidebar('footer'.$i)) {
                                    $count_act = $count_act + 1;
                                }
                            }
                            if ($count_act == 1) { ?>
                                <div class="widget_text widget-item">
                                    <div class="textwidget custom-html-widget">
                                        <div class="text-center col-md-10 col-md-offset-1">
                                            <?php dynamic_sidebar('footer1');?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else {
                                if (is_active_sidebar('footer1')) {
                                    echo '<div class="footer1 col-md-3">';
                                    dynamic_sidebar('footer1');
                                    echo '</div>';
                                }
                                if (is_active_sidebar('footer2')) {
                                    echo '<div class="footer2 col-md-3">';
                                    dynamic_sidebar('footer2');
                                    echo '</div>';
                                }
                                if (is_active_sidebar('footer3')) {
                                    echo '<div class="footer3 col-md-3">';
                                    dynamic_sidebar('footer3');
                                    echo '</div>';
                                }
                                if (is_active_sidebar('footer4')) {
                                    echo '<div class="footer4 col-md-3">';
                                    dynamic_sidebar('footer4');
                                    echo '</div>';
                                }
                            }
                            if (!is_active_sidebar('footer1') && !is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4')) {
                            ?>
                                <div class="widget_text widget-item">
                                    <div class="textwidget custom-html-widget">
                                        <div class="text-center col-md-10 col-md-offset-1">
                                            <div class="title ">
                                                <h2 class="text-white">
                                                    <small class="text-uppercase text-lato ls1 f12">Visit Us</small><br>
                                                    Our Address
                                                </h2>
                                                <div class="cross"></div>
                                            </div>
                                            <p class="mt50 mb50">Thank you for taking the time to visit our website. We hope you’ll visit us in person soon. <br>
                                                Open Everyday Monday - Sunday, 9 a.m. - 9 p.m.
                                            </p>
                                            <p class="text-white">
                                                Church Street , 34824 Weyerhaeuser Way South
                                                Federal Way, 
                                                <br>
                                                WA 98001<br>
                                                <a href="mailto:info@churchtheme.com">info@churchtheme.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div><!-- /footer-widgets -->
            <?php
            if (get_theme_mod('church-footer-text-display') == false) {
                $footer_text = get_theme_mod('church-footer-text-custom');
                $footer_text_link = get_theme_mod('church-footer-text-link');

                if (empty($footer_text)) {
                    $footer_text = 'www.churchtheme.com';
                }
                if (empty($footer_text_link)) {
                    $footer_text_link = '#';
                }
            ?>
            <section class="footer text-center ls1 text-white text-lato pt15 pb15">
                <a href="<?php echo $footer_text_link; ?>"><?php echo $footer_text; ?></a>
            </section>
            <?php } ?>
        </footer>
        <?php 
            wp_footer();
        }
        ?>
    </body>
</html>