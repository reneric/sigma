<div id='login-page' class='reset-password'>
<h2>RESET PASSWORD</h2>
<?php
	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'resetpassword'));
	echo $this->Form->input('name', array('label' => 'Enter username or email address'));
	echo $this->Form->end('Submit');
?>
<div class='clear'></div>
</div>