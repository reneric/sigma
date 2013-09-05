<div id='shopping-cart'>
<table id='cart'>
<?php
	echo $this->Html->tableHeaders(array('Name', 'Price', 'Action'));

	if(isset($cart)){
		foreach($cart as $item){
			$price = Configure::read('AMK.report_price');
			echo $this->Html->tableCells(array($item['Report']['company_name'], $this->Number->currency($price, 'USD'), $this->Html->link('Remove', array('controller' => 'Reports', 'action' => 'delfromcart', $item['Report']['id']))));
		}

		echo $this->Html->tableCells(array('Total', $this->Number->currency($total, 'USD'), ''));
	}
	else{
		echo $this->Html->tableCells(array('Your cart is empty'));
	}
?>
</table>
<?php 
	if(isset($cart)){
		echo $this->Html->link('Checkout', array('controller' => 'Users', 'action' => 'checkout'), array('class' => 'checkout'));
		//echo $this->element('checkout_button');
	}
?>
</div>
