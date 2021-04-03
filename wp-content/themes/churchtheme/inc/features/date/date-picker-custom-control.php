<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom date picker
 */
class Date_Picker_Custom_Control extends WP_Customize_Control
{
    /**
    * Enqueue the styles and scripts
    */
    public function enqueue()
    {
        wp_enqueue_style( 'jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        wp_enqueue_script( 'jquery-ui-datepicker' );
    }

    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {

        ?>
            <label>
              <span class="customize-date-picker-control"><?php echo esc_html( $this->label ); ?></span>
              <input type="date" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="datepicker" />
            </label>
            <script>
                (function($) {
                  $('#<?php echo $this->id; ?>').datepicker();
                }(jQuery));
            </script>
        <?php
    }
}
?>