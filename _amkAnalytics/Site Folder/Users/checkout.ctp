<?php
	/*$test_mode = Configure::read('authnet_test_mode');
	$prefill   = Configure::read('authnet_test_mode');

	$time = time();
	$fp = AuthorizeNetDPM::getFingerprint(Configure::read('authnet_api_id'), Configure::read('authnet_transaction_key'), $total, $transId, $time);
	$sim = new AuthorizeNetSIM_Form(
		array(
			'x_amount'        => $total,
			'x_fp_sequence'   => $transId,
			'x_fp_hash'       => $fp,
			'x_fp_timestamp'  => $time,
			'x_relay_response'=> "TRUE",
			'x_relay_url'     => $relay,
			'x_login'         => Configure::read('authnet_api_id'),
			'x_invoice_num'   => $transId
		)
	);

	$hidden_fields = $sim->getHiddenFieldString();
	$post_url = AuthorizeNetDPM::LIVE_URL; //($test_mode ? AuthorizeNetDPM::SANDBOX_URL : AuthorizeNetDPM::LIVE_URL);

    $prefillData = array();
    $prefillData['test']['cc']         = '6011000000000012';
    $prefillData['test']['exp_date']   = '04/17';
    $prefillData['test']['card_code']  = '782';
    $prefillData['test']['first_name'] = 'John';
    $prefillData['test']['last_name']  = 'Doe';
    $prefillData['test']['address']    = '123 Main Street';
    $prefillData['test']['city']       = 'Boston';
    $prefillData['test']['state']      = 'MA';
    $prefillData['test']['zip']        = '02142';
    $prefillData['test']['country']    = 'US';

    $prefillData['live']['cc'] = '';
    $prefillData['live']['exp_date'] = '';
    $prefillData['live']['card_code']= '';
    $prefillData['live']['first_name'] = $user['first_name'];
    $prefillData['live']['last_name']  = $user['last_name'];
    $prefillData['live']['address']    = $user['address'];
    $prefillData['live']['city']       = $user['city'];
    $prefillData['live']['state']      = $user['state'];
    $prefillData['live']['zip']        = $user['zip'];
    $prefillData['live']['country']    = $user['country'];

    if($test_mode)
        $prefill = $prefillData['test'];
    else
        $prefill = $prefillData['live'];
*/
?>
<!--
<script type='text/javascript'>
$(function(){
    $('#card_num, #card_code').keypress(function(e){
        var key = String.fromCharCode(e.keyCode);
        var regex = /[0-9]/;
        if(!regex.test(key))
            e.preventDefault();
    });

    $('#exp_date').keypress(function(e){
        var key = String.fromCharCode(e.keyCode);
        var regex = /[0-9]|-|\/|\\/;
        if(!regex.test(key))
            e.preventDefault();
    });
});
</script>
<form method="post" action="<?php echo $post_url; ?>">
    <div id='checkout-form' class='grey-grad'>
    <h1>Check out:</h1>
    <?php echo $hidden_fields; ?>
    <h2>Credit Card:</h2>
<fieldset>
    <div>
        <label>CC # (numbers only)</label>
        <input id='card_num' type="text" class="text" size="15" name="x_card_num" value="<?php echo @$prefill['cc']; ?>"></input>
    </div>
    <div>
        <label>Exp.</label>
        <input type="text" class="text" size="4" id='exp_date' name="x_exp_date" value="<?php echo @$prefill['exp_date']; ?>"></input>
    </div>
    <div>
        <label>CCV</label>
        <input type="text" class="text" size="4" id='card_code' name="x_card_code" value="<?php echo @$prefill['card_code']; ?>"></input>
    </div>
</fieldset>
<h2>Name:</h2>
<fieldset>
    <div>
        <label>First Name</label>
        <input type="text" class="text" size="15" name="x_first_name" value="<?php echo @$prefill['first_name']; ?>"></input>
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" class="text" size="14" name="x_last_name" value="<?php echo @$prefill['last_name']; ?>"></input>
    </div>
</fieldset>
<h2>Billing Info:</h2>
<fieldset>
    <div>
        <label>Address</label>
        <input type="text" class="text" size="26" name="x_address" value="<?php echo @$prefill['address']; ?>"></input>
    </div>
    <div>
        <label>City</label>
        <input type="text" class="text" size="15" name="x_city" value="<?php echo @$prefill['city']; ?>"></input>
    </div>

    <div>
        <label>State</label>
        <input type="text" class="text" size="4" name="x_state" value="<?php echo @$prefill['state']; ?>"></input>
    </div>
    <div>
        <label>Zip Code</label>
        <input type="text" class="text" size="9" name="x_zip" value="<?php echo @$prefill['zip']; ?>"></input>
    </div>
    <div>
        <label>Country</label>
        <input type="text" class="text" size="22" name="x_country" value="<?php echo @$prefill['country']; ?>"></input>
    </div>
    <input type="hidden" name="x_test_request" value="<?php echo ($test_mode ? "TRUE" : "FALSE"); ?>" />
</fieldset>
</div>
<input type="submit" value="BUY" class="submit checkout-button buy blue-grad button">
</form>
-->

<?php
    $api_login_id    = Configure::read('authnet_api_id');
    $transaction_key = Configure::read('authnet_transaction_key');
    $amount          = $total;
    $fp_timestamp    = time();
    $fp_sequence     = "123" . time(); // Enter an invoice or other unique number.
    $fingerprint     = AuthorizeNetSIM_Form::getFingerprint($api_login_id,$transaction_key, $amount, $fp_sequence, $fp_timestamp);
?>

<form method='post' id='checkout-form' action="<?php echo AuthorizeNetDPM::LIVE_URL; ?>">
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
<?php if(strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 8.0") === false): ?>
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
<?php endif; ?>
<input type='submit' value="Checkout" style='border: 0px' class='checkout'>
</form>
<script type='text/javascript'>
$(function(){
    $('#checkout-form').submit();
});
</script>