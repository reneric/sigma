<?php echo $this->Form->create('User', array('controller' => 'Users', 'action' => 'admin_edit')); ?>

<table>
	<?php echo $this->Html->tableHeaders(array('User', 'Status', 'Role')); ?>
	<?php

		foreach($users as $idx => $user){
			$cell  = $this->Form->input($idx . 'User.subscribed', array('label' => '', 'type' => 'select', 'options' => array('0' => 'Unsubscribed', '1' => 'Subscribed'), 'selected' => $user['User']['subscribed']));
			$cell .= $this->Form->input($idx . 'User.id', array('label' => '', 'type' => 'hidden', 'value' => $user['User']['id']));

			$role = $this->Form->input($idx . 'User.role', array('label' => '', 'type' => 'select', 'options' => array('admin' => 'admin', 'user' => 'user'), 'selected' => $user['User']['role']));
			echo $this->Html->tableCells(array($user['User']['username'], $cell, $role));
		}
	?>
</table>




<div id='admin-submit'>
	<?php echo $this->Form->end('SUBMIT'); ?>

	<div id='admin-pagination'>
		<?php 
			echo $this->Paginator->prev();
			echo '&nbsp;&nbsp;&nbsp;';
			echo $this->Paginator->numbers();
			echo '&nbsp;&nbsp;&nbsp;';
			echo $this->Paginator->next();
			echo '<div class="clear"></div>';
		?>
	</div>
</div>