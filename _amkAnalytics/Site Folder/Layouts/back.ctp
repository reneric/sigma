<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		AMK Analytics | Making Intangibles Tangible
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->element('include_scripts');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<script type='text/javascript' defer="defer">
	$(function(){
		$('.tablesorter').tablesorter();
	});
	</script>
	<div id='ajax-message'><?php echo $this->Session->flash(); ?></div>
	<div id='session-bar'>
		<div class='width-container'>
			<p class='left'>Welcome, <?php echo $user['username']; ?></p>
		<?php
			echo $this->Html->link('Log Out', array('controller' => 'Users', 'action' => 'logout', 'admin' => false), array('class' => 'right'));
		?>
		</div>
	</div>
	<div id="container">
		<div id="header">
			<?php
					echo "<div id='main-nav-container'>";

						echo $this->Html->link($this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'AMK Analytics')), '/', array('escape' => false));

						echo "<div id='slogan-container'>";
							echo $this->Html->image('slogan.png', array('id' => 'slogan', 'alt' => 'MAKING INTANGIBLES TANGIBLE'));
						echo "</div>";

						echo "<div id='main-nav' class='back'>";
							if(!$user['subscribed'])
							{
								echo "<div style='margin-right: 40px; float: right; position: relative;'>";
								
								if(isset($cart))
									echo "<div id='items'>" . count($cart) . "</div>";
								else
									echo "<div id='items' style='display:none'></div>";

								echo $this->Menu->link('View Cart', array('controller' => 'Users', 'action' => 'viewcart'), array('class' => 'last'));
								echo "</div>";
							}
							echo $this->Menu->link('My Reports', array('controller' => 'Users', 'action' => 'myreports', 'admin' => false));
							echo $this->Menu->link('Search', array('controller' => 'Reports', 'action' => 'search', 'admin' => false));
							if($user['role'] == 'admin')
								echo $this->Menu->link('Edit Users', array('controller' => 'Users', 'action' => 'admin_edit', 'admin' => true));
							
						echo '</div>';
						
					echo '<div class="clear"></div></div>';
					echo '</div>';
			?>

		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>

		</div>
		<div class='clear'></div>
		<div id="footer">
			<?php
						echo "<div id='footer-nav'>";
							echo $this->Html->link('Contact Us', array('controller' => 'Pages', 'action' => 'contact'));
							echo "<a href='/amk/blog/?feed=rss2'>RSS Feed</a>";
							//echo $this->Html->link('Site Map', array('controller' => 'Users', 'action' => 'login'));
							echo "<a href='/amk/blog/'>Newsletter</a>";
						echo '<a>&copy;AMK Analytics 2012</a></div>';
						
			?>
		</div>
	</div>
	<?php if(Configure::read('debug') != 0) echo $this->element('sql_dump'); ?>
</body>
</html>