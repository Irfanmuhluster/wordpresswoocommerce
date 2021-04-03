<?php
    include_once('email_admin.php');
?>
<div class="col-md-6 mb50">
    <div class="bg-grey p15">
        <div class="title mb50 text-left">
            <h2 class="text-pink">Send Message</h2>
        </div>
        <form id="formcontact" method="post" action="<?php echo get_template_directory_uri().'/inc/emails/email_action.php'?>?adminemail=<?php echo $admin_email; ?>&adminname=<?php echo $admin_name; ?>&secretkey=<?php echo $secretkey; ?>&catname=&eventname=Contact&action=contact&recaptcha=<?php echo $recaptcha; ?>">
            <div id="msg-contact" class="form-group"></div>
            <div class="form-group">
                <label>Your Name</label>
                <input id="contact_name" name="contact_name" type="text" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label>Your Email</label>
                <input id="contact_email" name="contact_email" type="email" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea id="contact_msg" name="contact_msg" class="form-control" placeholder=""></textarea>
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
            <button type="submit" class="btn btn-lg btn-primary mb50">Submit</button>
        </form>
    </div>
</div>

<!-- contact -->
<script type="text/javascript">
    $("#formcontact").validate({
        rules: {
            contact_name: {
                required: true
            },
            contact_email: {
                required: true,
                email: true
            },
            contact_msg: {
                required: true
            }
        },
        messages: {
            contact_name: {
                required: 'Please fill out this field.'
            },
            contact_email: {
                required: 'Please fill out this field.',
                email: 'Your email not valid.'
            },
            contact_msg: {
                required: 'Please fill out this field.'
            }
        },
        errorLabelContainer: '.errorMsg',
        errorElement: 'div',
        submitHandler: function() {
            $.ajax({
                url: $("#formcontact").attr('action'),
                type: "post",
                dataType :"json",
                data : $("#formcontact").serialize()
            })
            .done(function (response, textStatus, jqXHR){
                $('#msg-contact').html(response.msg).show();
                if (response.status == 1) {
                    $('#contact_name').val('');
                    $('#contact_email').val('');
                    $('#contact_msg').val('');
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
