Hello <?php echo $name; ?>,<br />

Someone recently requested a password reset on your AMK Analytics account.  If this was you and you would like to reset your password, please follow the link below to reset your password:<br />
<?php echo $this->Html->link('Reset your password', $this->Html->url(array('controller' => 'users', 'action' => 'resetconfirm',  $userid, $key), true)); ?>