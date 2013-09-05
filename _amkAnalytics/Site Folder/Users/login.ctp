<div id='login-page-wrapper'>

<div id='login-page'>
<h2>LOG IN</h2>

<?php
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
	echo '<div class="clear"></div>';
	echo $this->Html->link('Forgot your password?', array('controller' => 'users', 'action' => 'resetpassword'));
?>
</div>

<div id='login-register'>
<h2>NOT A MEMBER YET?<br/>CREATE AN ACCOUNT:</h2>

	<?php echo $this->Html->link('SIGN UP NOW', array('controller' => 'Pages', 'action' => 'purchase'), array('class' => 'blue-grad login-sign-up')); 
	?>

</div>

</div>