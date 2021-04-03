<?php
    include_once('email_admin.php');
?>
<!-- start modal register community modal-->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registration <?php echo $cat_name; ?></h4>
            </div>
            <div class="modal-body">
                <form id="formregistration" method="post" action="<?php echo get_template_directory_uri().'/inc/emails/email_action.php'?>?adminemail=<?php echo $admin_email; ?>&adminname=<?php echo $admin_name; ?>&secretkey=<?php echo $secretkey; ?>&catname=<?php echo $cat_name; ?>&eventname=<?php echo the_title(); ?>&action=register&recaptcha=<?php echo $recaptcha; ?>">
                    <div id="msg-registration" class="form-group"></div>
                    <div class="form-group">
                        <label><?php echo $cat_name; ?> Name</label>
                        <select name="reg_event" class="form-control">
                            <option value="">-- Select Event --</option>
                            <?php
                                if ($cat_id > 0) :
                                    $event = new WP_Query('cat='.$cat_id);

                                    if ($event->have_posts()) :
                                        while ($event->have_posts()) : $event->the_post();
                                        ?>
                                        <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                                        <?php 
                                        endwhile;
                                    endif;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Your Name</label>
                        <input id="reg_name" name="reg_name" type="text" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Your Email</label>
                        <input id="reg_email" name="reg_email" type="email" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Your Address</label>
                        <input id="reg_address" name="reg_address" type="text" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Your Telephone</label>
                        <input id="reg_phone" name="reg_phone" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Number Of Person</label>
                        <input id="reg_person" name="reg_person" type="number" class="form-control" placeholder="">
                    </div>
                    <?php
                    if (get_theme_mod('church-email-setting-addcaptcha') == true) {
                    ?>
                    <div class="form-group">
                        <div id="recaptchaform"></div>
                    </div>
                    <!-- google recaptcha -->
                    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
                    <?php
                    }
                    ?>
                    <button id="submit_reg" name="submit_reg" type="submit" class="mb25 btn btn-orange btn-lg mt25">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- registration -->
<script type="text/javascript">
    $("#formregistration").validate({
        rules: {
            reg_name: {
                required: true
            },
            reg_email: {
                required: true,
                email: true
            },
            reg_address: {
                required: true
            },
            reg_phone: {
                required: true
            },
            reg_person: {
                required: true
            }
        },
        messages: {
            reg_name: {
                required: 'Please fill out this field.'
            },
            reg_email: {
                required: 'Please fill out this field.',
                email: 'Your email not valid.'
            },
            reg_address: {
                required: 'Please fill out this field.'
            },
            reg_phone: {
                required: 'Please fill out this field.'
            },
            reg_person: {
                required: 'Please fill out this field.'
            }
        },
        errorLabelContainer: '.errorMsg',
        errorElement: 'div',
        submitHandler: function() {
            $.ajax({
                url: $("#formregistration").attr('action'),
                type: "post",
                dataType :"json",
                data : $("#formregistration").serialize()
            })
            .done(function (response, textStatus, jqXHR){
                console.log(response);
                $('#msg-registration').html(response.msg).show();
                if (response.status == 1) {
                    $('#reg_name').val('');
                    $('#reg_email').val('');
                    $('#reg_address').val('');
                    $('#reg_phone').val('');
                    $('#reg_person').val('');
                    grecaptcha.reset();
                };
            })
            .fail(function (jqXHR, textStatus, errorThrown){
                console.log(textStatus);
                console.log(errorThrown);
                console.log(jqXHR.responseText);
            });
            
            return false;
        }
    });
</script>