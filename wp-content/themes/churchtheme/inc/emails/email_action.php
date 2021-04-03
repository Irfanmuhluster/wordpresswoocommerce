<?php
/**
 * Email action churchtheme
 * @author krisna <kresna@jogja.camp>
 */

//site secret key
$secret = $_GET['secretkey'];
$admin_email = $_GET['adminemail'];
$admin_name = $_GET['adminname'];
$cat_name = $_GET['catname'];
$event_name = $_GET['eventname'];

// konten email
$reg_event = '';
$reg_name = '';
$reg_email = '';
$reg_address = '';
$reg_phone = '';
$reg_person = '';

$contact_name = '';
$contact_email = '';
$contact_msg = '';

$donate_name = '';
$donate_email = '';
$donate_money = '';

$email_content_reg = '';
$email_content_contact = '';
$email_content_donate = '';

$subject_email = 'Email '.$event_name;
$subject_admin = ' - Notification for administrator';

$email_header_admin = '<!DOCTYPE html>
<html>
<head>
</head>
<body style="font-family: arial, sans-serif;">
<p>Dear Administrator, you have a new email, please contact the following detail bellow :</p>';

// action for registration
if ($_GET['action'] == 'register') {
    $reg_event = $_POST['reg_event'];
    $reg_name = $_POST['reg_name'];
    $reg_email = $_POST['reg_email'];
    $reg_address = $_POST['reg_address'];
    $reg_phone = $_POST['reg_phone'];
    $reg_person = $_POST['reg_person'];
    $recaptcha = $_GET['recaptcha'];

    $result_msg = array();
    if (empty($reg_event)) {
        $result_msg[] = 'Please fill out '.$cat_name.' name field.';
    }
    if (empty($reg_name)) {
        $result_msg[] = 'Please fill out name field.';
    }
    if (empty($reg_email)) {
        $result_msg[] = 'Please fill out email field.';
    }
    if (empty($reg_address)) {
        $result_msg[] = 'Please fill out message field.';
    }
    if (empty($reg_phone)) {
        $result_msg[] = 'Please fill out telephone field.';
    }
    if (empty($reg_person)) {
        $result_msg[] = 'Please fill out number of person field.';
    }
    if ($recaptcha == 1) {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //get verify response data
            $data = array(
                'secret' => $secret,
                'response' => $_POST['g-recaptcha-response']
            );

            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            $responseData = json_decode($response);
            
            if(!$responseData->success):
                $result_msg[] = 'reCAPTCHA not valid.';
            endif;
        else:
            $result_msg[] = 'reCAPTCHA validation is required.';
        endif;
    }

    if (!$result_msg) {
        $email_header_user = email_header_user($reg_name);

        $email_content_reg = '<table style="border-collapse: collapse; width: 100%;">
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$cat_name.' Name</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_event.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_name.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Email</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_email.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Address</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_address.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Telp./Hp.</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_phone.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Number of Person</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$reg_person.'</td>
          </tr>
        </table>
        </body>
        </html>';

        // to user
        $from_user = $admin_email;
        $from_name_user = $admin_name;
        $to_user = $reg_email;

        // to admin
        $from_adm = $reg_email;
        $from_name_adm = $reg_name;
        $to_adm = $admin_email;

        $subject_user = $subject_email;
        $content_user = $email_header_user.$email_content_reg;

        $subject_adm = $subject_email.$subject_admin;
        $content_adm = $email_header_admin.$email_content_reg;

        sentEmail(
        $from_user, 
        $from_name_user, 
        $to_user,
        $subject_user, 
        $content_user, 
        $from_adm,
        $from_name_adm,
        $to_adm,
        $subject_adm, 
        $content_adm
        );
    } else {
        $response['status'] = 0;
        $response['msg'] = iErrorBox(implode('<br>',$result_msg));

        header('Content-type: application/json');
        echo json_encode($response);
    }
}

// action for contact
if ($_GET['action'] == 'contact') {
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_msg = $_POST['contact_msg'];
    $recaptcha = $_GET['recaptcha'];

    $result_msg = array();
    if (empty($contact_name)) {
        $result_msg[] = 'Please fill out name field.';
    }
    if (empty($contact_email)) {
        $result_msg[] = 'Please fill out email field.';
    }
    if (empty($contact_msg)) {
        $result_msg[] = 'Please fill out message field.';
    }
    if ($recaptcha == 1) {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //get verify response data
            $data = array(
                'secret' => $secret,
                'response' => $_POST['g-recaptcha-response']
            );

            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            $responseData = json_decode($response);
            
            if(!$responseData->success):
                $result_msg[] = 'reCAPTCHA not valid.';
            endif;
        else:
            $result_msg[] = 'reCAPTCHA validation is required.';
        endif;
    }

    if (!$result_msg) {
        $email_header_user = email_header_user($contact_name);

        $email_content_contact = '<table style="border-collapse: collapse; width: 100%;">
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">NAME</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$contact_name.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">EMAIL</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$contact_email.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">MESSAGE</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$contact_msg.'</td>
          </tr>
        </table>
        </body>
        </html>';

        // to user
        $from_user = $admin_email;
        $from_name_user = $admin_name;
        $to_user = $contact_email;

        // to admin
        $from_adm = $contact_email;
        $from_name_adm = $contact_name;
        $to_adm = $admin_email;

        $subject_user = $subject_email;
        $content_user = $email_header_user.$email_content_contact;

        $subject_adm = $subject_email.$subject_admin;
        $content_adm = $email_header_admin.$email_content_contact;

        sentEmail(
        $from_user, 
        $from_name_user, 
        $to_user,
        $subject_user, 
        $content_user, 
        $from_adm,
        $from_name_adm,
        $to_adm,
        $subject_adm, 
        $content_adm
        );
    } else {
        $response['status'] = 0;
        $response['msg'] = iErrorBox(implode('<br>',$result_msg));

        header('Content-type: application/json');
        echo json_encode($response);
    }
}

// action for donate
if ($_GET['action'] == 'donate') {
    $donate_name = $_POST['donate_name'];
    $donate_email = $_POST['donate_email'];
    $donate_money = $_POST['donate_money'];
    $currency = $_GET['currency'];
    $recaptcha = $_GET['recaptcha'];

    $result_msg = array();
    if (empty($donate_name)) {
        $result_msg[] = 'Please fill out name field.';
    }
    if (empty($donate_email)) {
        $result_msg[] = 'Please fill out email field.';
    }
    if (empty($donate_money)) {
        $result_msg[] = 'Please fill out amount field.';
    }
    if ($recaptcha == 1) {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //get verify response data
            $data = array(
                'secret' => $secret,
                'response' => $_POST['g-recaptcha-response']
            );

            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            $responseData = json_decode($response);
            
            if(!$responseData->success):
                $result_msg[] = 'reCAPTCHA not valid.';
            endif;
        else:
            $result_msg[] = 'reCAPTCHA validation is required.';
        endif;
    }

    if (!$result_msg) {
        $email_header_user = email_header_user($donate_name);
        
        $separator1 = ',';
        $separator2 = '.';
        if ($currency == 'IDR') {
            $separator1 = '.';
            $separator2 = ',';
        }
        $donate_money = iCurrency($donate_money, $currency, $separator1, $separator2);

        $email_content_donate = '<table style="border-collapse: collapse; width: 100%;">
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">NAME</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$donate_name.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">EMAIL</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$donate_email.'</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">AMOUNT</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$donate_money.'</td>
          </tr>
        </table>
        </body>
        </html>';

        // to user
        $from_user = $admin_email;
        $from_name_user = $admin_name;
        $to_user = $donate_email;

        // to admin
        $from_adm = $donate_email;
        $from_name_adm = $donate_name;
        $to_adm = $admin_email;

        $subject_user = $subject_email;
        $content_user = $email_header_user.$email_content_donate;

        $subject_adm = $subject_email.$subject_admin;
        $content_adm = $email_header_admin.$email_content_donate;

        sentEmail(
        $from_user, 
        $from_name_user, 
        $to_user,
        $subject_user, 
        $content_user, 
        $from_adm,
        $from_name_adm,
        $to_adm,
        $subject_adm, 
        $content_adm
        );
    } else {
        $response['status'] = 0;
        $response['msg'] = iErrorBox(implode('<br>',$result_msg));

        header('Content-type: application/json');
        echo json_encode($response);
    }
}

function sentEmail(
    $from_user = '',
    $from_name_user = '',
    $to_user = '',
    $subject_user = '',
    $content_user = '',
    $from_adm = '',
    $from_name_adm = '',
    $to_adm = '',
    $subject_adm = '',
    $content_adm = ''
    )
{
    // to admin
    $headers_adm = "MIME-Version: 1.0" . "\r\n";
    $headers_adm .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers_adm .= "From: " . $from_name_adm . " <".$from_adm.">". "\r\n";
    $sent1 = mail($to_adm, $subject_adm, $content_adm, $headers_adm);

    // to customer
    $headers_user = "MIME-Version: 1.0" . "\r\n";
    $headers_user .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers_user .= "From: " . $from_name_user . " <".$from_user.">". "\r\n";
    $sent2 = mail($to_user, $subject_user, $content_user, $headers_user);

    if ($sent1 && $sent2) {
        $response['status'] = 1;
        $response['msg'] = iSuccBox('Thankyou for your participate. Our team will contact you soon.');
    } else {
        $response['status'] = 0;
        $response['msg'] = iErrorBox('Data sending failed, try again.');
    }
    
    header('Content-type: application/json');
    echo json_encode($response);
}

function iErrorBox($x)
{
    return '<div class="alert alert-danger">'.$x.'</div>';
}

function iSuccBox($x)
{
    return '<div class="alert alert-success">'.$x.'</div>';
}

function iCurrency(
    $value, 
    $currency = 'IDR', 
    $separator1 = ',', 
    $separator2 = '.'
    )
{
    return $currency.' '.number_format($value,2,$separator1,$separator2);
}

function email_header_user($name)
{
    $email_header_user = '<!DOCTYPE html>
        <html>
        <head>
        </head>
        <body style="font-family: arial, sans-serif;">
        <p>Dear '.$name.', Thank You for your email, we will contact you shortly regarding this. Bellow is your detail :</p>';

    return $email_header_user;
}
?>