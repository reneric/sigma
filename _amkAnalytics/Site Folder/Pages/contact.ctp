<div id='contact'>
	<h2>Contact Us</h2>
	<h3>Let us know how we can help. An AMK Analytics representative will respond within one business day.</h3>
	<?php
	echo $this->Form->create('ContactMessage', array('url' => array('controller' => 'Pages', 'action' => 'contact')));
	echo "<div class='left'>";
	echo $this->Form->input('name', array('label' => 'Name:'));
	echo $this->Form->input('title', array('label' => 'Title:'));
	echo $this->Form->input('company', array('label' => 'Company:'));
	echo "</div>";

	echo "<div class='right'>";
	echo $this->Form->input('email', array('label' => 'E-mail:'));
	echo $this->Form->input('phone', array('label' => 'Telephone:'));
	
	echo "</div><div class='clear'></div><div id='message'>";
	$options = array('Custom Consulting' => 'Custom Consulting', 'Product Information - Corporate Reports' => 'Product information - Corporate Reports', 'Product Information - Investor Subscription' => 'Product Information - Investor Subscription', '3' => 'Sales', 'Customer Services' => 'Customer Service', 'Technical Assistance' => 'Technical Assistance', 'Other' => 'Other');
	echo $this->Form->input('subject', array(
		'label' => 'Subject:',
		'type' => 'select',
		'empty' => true,
		'options' => $options
		));
	echo $this->Form->input('notes', array('label' => 'Message:','type' => 'textarea', 'escape' => false));	
	echo "</div>";
	
	
	
	echo $this->Form->end('SEND');
?>
</div>