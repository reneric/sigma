<div id='login-page' class='reset-confirm'>
<h2>ENTER YOUR NEW PASSWORD</h2> 
<?php
	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'resetconfirm', $usr['User']['id'], $usr['User']['activation_key']));
	echo $this->Form->input('password', array('label' => 'New password'));
	echo $this->Form->input('confirm_password', array('label' => 'Confirm password', 'type' => 'password'));
	echo $this->Form->input('activation_key', array('label' => '', 'type' => 'hidden', 'value' => $usr['User']['activation_key']));
	echo $this->Form->input('id', array('label' => '', 'type' => 'hidden', 'value' => $usr['User']['id']));
	echo $this->Form->end('Reset');
?>
<div class='clear'></div>
</div>