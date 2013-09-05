<div id='register-form'>
<h2>REGISTER</h2>
<h3><?php if($registerType == 'subscribe'){
		echo "The cost of a 12-month subscription with unlimited access to the amkANALYTICS Database is $30,000. There is a special introductory rate of $10,000 for the first year’s subscription for new subscribers. To order by phone, please call (800) 420-7690.<br/><br/>";
	}?>
	Fill out the folllowing form to create your amkANALYTICS account:
	
</h3>
<?php
	echo $this->Form->create('User', array('action' => 'register'));
	echo "<div class='left'>";
	
	echo $this->Form->input('username', array('label' => 'Username'));
	echo $this->Form->input('first_name', array('label' => 'First Name'));
	echo $this->Form->input('last_name', array('label' => 'Last Name'));
	echo $this->Form->input('company', array('label' => 'Company'));
	echo $this->Form->input('position', array('label' => 'Position'));
	echo $this->Form->input('email', array('label' => 'Email'));
	echo $this->Form->input('confirm_email', array('label' => 'Confirm Email'));
	if($registerType == 'subscribe'){
		echo $this->Form->input('iard_crd', array('label' => 'IARD/CRD #'));
		echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'subscriber'));
	}
	echo "</div><div class='right'>";
	echo $this->Form->input('password', array('label' => 'Password', 'value' => ''));
	echo $this->Form->input('confirm_password', array('label' => 'Confirm password', 'type' => 'password', 'value' => ''));
	echo $this->Form->input('phone', array('label' => 'Phone'));
	echo $this->Form->input('address', array('label' => 'Address'));
	echo $this->Form->input('city', array('label' => 'City'));
	echo $this->Form->input('state', array('label' => 'State'));
	echo $this->Form->input('zip', array('label' => 'Zip'));
	echo $this->Form->input('country', array('label' => 'Country'));
	echo "</div><div class='clear'></div><div class='terms'>";


	$link = $this->Html->link('terms and conditions', array('controller' => 'Pages', 'action' => 'terms'), array('id' => 'tAndC'));
	echo $this->Form->input('agree', array('label' => 'I agree to the ' . $link, 'type' => 'checkbox'));
	echo "</div>";
	echo $this->Form->end('Register');
?>
</div>

<script type='text/javascript'>
$('#register-form form').submit(function(e){
	if($("input[name='data[User][agree]']:checked").length == 0){
		alert("You must agree to the terms and conditions in order to register");
		return false;
	}

	return true;
});
</script>