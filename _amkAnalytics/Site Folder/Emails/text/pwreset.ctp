Hello <?php echo $name; ?>,

Someone recently requested a password reset on your AMK Analytics account.  If this was you, please follow the link below to reset your password:<br />
<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'resetconfirm', $userid, $key), true); ?>