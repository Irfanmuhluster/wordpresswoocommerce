<?php
    include_once('email_admin.php');
    $currency = get_theme_mod('church-email-donate-currency');
    if (empty($currency) OR $currency == false) {
        $currency = 'IDR';
    }
?>
<div class="col-md-5 pt15 pb15">
    <form id="formdonate" method="post" action="<?php echo get_template_directory_uri().'/inc/emails/email_action.php'?>?adminemail=<?php echo $admin_email; ?>&adminname=<?php echo $admin_name; ?>&secretkey=<?php echo $secretkey; ?>&catname=&eventname=&action=donate&currency=<?php echo $currency; ?>&recaptcha=<?php echo $recaptcha; ?>">
        <div id="msg-donate" class="form-group"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input id="donate_name" name="donate_name" type="text" class="form-control"  placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input id="donate_email" name="donate_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
            <div class="input-group">
                <div class="input-group-addon"><?php echo $currency; ?></div>
                <input id="donate_money" name="donate_money" type="number" class="form-control" id="InputAmount" placeholder="Amount">
                <div class="input-group-addon">.00</div>
            </div>
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
        <br/>
        <button type="submit" class="btn btn-lg btn-primary mt25">Give Now</button>
    </form>
</div>

<script type="text/javascript">
    $("#formdonate").validate({
        rules: {
            donate_name: {
                required: true
            },
            donate_email: {
                required: true,
                email: true
            },
            donate_money: {
                required: false
            }
        },
        messages: {
            donate_name: {
                required: 'Please fill out this field.'
            },
            donate_email: {
                required: 'Please fill out this field.',
                email: 'Your email not valid.'
            },
            donate_money: {
                required: 'Please fill out this field.'
            }
        },
        errorLabelContainer: '.errorMsg',
        errorElement: 'div',
        submitHandler: function() {
            $.ajax({
                url: $("#formdonate").attr('action'),
                type: "post",
                dataType :"json",
                data : $("#formdonate").serialize()
            })
            .done(function (response, textStatus, jqXHR){
                $('#msg-donate').html(response.msg).show();
                if (response.status == 1) {
                    $('#donate_name').val('');
                    $('#donate_email').val('');
                    $('#donate_money').val('');
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