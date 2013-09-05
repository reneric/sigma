<?php
    $api_login_id    = Configure::read('authnet_api_id');
    $transaction_key = Configure::read('authnet_transaction_key');
    $amount          = $total;
    $fp_timestamp    = time();
    $fp_sequence     = "123" . time(); // Enter an invoice or other unique number.
    $fingerprint     = AuthorizeNetSIM_Form::getFingerprint($api_login_id,$transaction_key, $amount, $fp_sequence, $fp_timestamp);
?>

<form method='post' action="<?php echo AuthorizeNetDPM::LIVE_URL; ?>">
<input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
<input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />
<input type='hidden' name="x_amount" value="<?php echo $amount?>" />
<input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
<input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
<input type='hidden' name="x_version" value="3.1">
<input type='hidden' name="x_show_form" value="payment_form">
<input type='hidden' name="x_test_request" value="false" />
<input type='hidden' name='x_relay_response' value='TRUE' />
<input type='hidden' name='x_relay_url' value='<?php echo $relay; ?>' />
<input type='hidden' name='x_invoice_num' value='<?php echo $transId; ?>' />
<input type='hidden' name="x_method" value="cc">
<INPUT TYPE=HIDDEN NAME="x_header_html_payment_form" VALUE="<style type='text/css' media='all'>
    body
    {
        font: 13px/17px Calibri,'Myriad Pro',Candara, optima, sans-serif;
        color: #586163;
        width: 861px;
        position: relative;
        margin: 0px auto;
    }

    #divPageOuter
    {
        margin-top: 0;
        box-shadow: 0px 1px 10px #AAA;
        -mox-box-shadow: 0px 1px 10px #AAA;
        -webkit-box-shadow: 0px 1px 10px #AAA;
        color: #005ead;
        background:#e9e9e9;
        background:-webkit-gradient(linear,left top,left bottom,from(#EEE),to(#c5c9cc));
        background:-moz-linear-gradient(top,#EEE,#c5c9cc);
        filter:progid:DXImageTransform.Microsoft.gradient(  startColorstr='#EEEEEE',endColorstr='#c5c9cc');
    }

    #divPage
    {
        border: 0;
    }

    .Label
    {
        color: #005ead;
        font-weight: bold;
        font-size: 120%;
    }

    #btnSubmit
    {
        background: -moz-linear-gradient(center top , #4D8ABD, #004A94);
        background:-webkit-gradient(linear,left top,left bottom,from(#4D8ABD),to(#004A94));
        filter:progid:DXImageTransform.Microsoft.gradient(  startColorstr='#4D8ABD',endColorstr='#004A94');
        box-shadow: 1px 1px 5px #333333;
        -moz-box-shadow: 1px 1px 5px #333333;
        -webkit-box-shadow: 1px 1px 5px #333333;
        color: #98D0E8;
        cursor: pointer;
        float: left;
        padding: 6px 15px;
        border: 0;
    }

    #btnSubmit:hover
    {
        box-shadow: 1px 1px 3px #333333;
        -moz-box-shadow: 1px 1px 3px #333333;
        -webkit-box-shadow: 1px 1px 3px #333333;
    }
</style><h1>AMK ANALYTICS</h1> Please enter your payment and shipping information.">

<input type='submit' value="Checkout" class='checkout' style='border: 0px'>
</form>