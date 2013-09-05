Welcome <?php echo $name; ?>,<br />

Thank you for registering with AMK Analytics.  Your account is almost setup, we just need you to activate your account by following the link below:<br />
<?php echo $this->Html->link('Activate your account', $this->Html->url(array('controller' => 'Users', 'action' => 'activate', 'id' => $userid, 'key' => $key), true)); ?>